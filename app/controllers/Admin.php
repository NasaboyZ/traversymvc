<?php
class Admin extends Controller {
    private $adminModel;

    public function __construct() {
        $this->validation = new Validation();
        $this->adminModel = $this->model('AdminModel');
       
        if (!startSession(3600)) { 
            redirect('pages/login');
        }
    }
    
    public function index() {
        $this->dashboard();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    
            if (!validateCSRFToken($_POST['csrf_token'])) {
                die('Ungültiger CSRF-Token');
            }
    
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];
    
            if (empty($data['username'])) {
                $data['username_err'] = 'Bitte geben Sie Ihren Benutzernamen ein';
            }
    
            if (empty($data['password'])) {
                $data['password_err'] = 'Bitte geben Sie Ihr Passwort ein';
            }
    
            if ($this->adminModel->findUserByUsername($data['username'])) {
                // Benutzer gefunden
            } else {
                $data['username_err'] = 'Kein Benutzer gefunden';
            }
    
            if (empty($data['username_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->adminModel->login($data['username'], $data['password']);
    
                if ($loggedInUser) {
                    error_log('Login erfolgreich für Benutzer: ' . $loggedInUser->username);
                    $this->createUserSession($loggedInUser);
                } else {
                    error_log('Login fehlgeschlagen für Benutzer: ' . $data['username']);
                    $data['password_err'] = 'Passwort falsch';
                    $this->view('pages/login', $data);
                }
            } else {
                $this->view('pages/login', $data);
            }
        } else {
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => ''
            ];
    
            $this->view('admin/login', $data);
        }
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->username;
        error_log('Redirecting to admin/admin-dashboard');
        redirect('admin/admin-dashboard');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('pages/login');
    }

    public function dashboard() {
        if (!isset($_SESSION['user_id'])) {
            redirect('admin/login');
        }

        $events = $this->adminModel->getAllEvents();
        $fashionArtImages = $this->adminModel->getFashionArtImages();

        $data = [
            'username' => $_SESSION['user_name'],
            'events' => $events,
            'fashionArtImages' => $fashionArtImages
        ];

        $this->view('admin/admin-dashboard', $data);
    }

    public function newsbanner() {
        if (!isset($_SESSION['user_id'])) {
            redirect('admin/login');
        }

        $event = $this->adminModel->getCurrentEvent();
        $data = [
            'username' => $_SESSION['user_name'],
            'event' => $event
        ];

        $this->view('admin/newsbanner', $data);
    }

    public function newevent() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            foreach ($_POST['event_title'] as $key => $title) {
                $description = trim($_POST['event_description'][$key]);
                $date = trim($_POST['event_date'][$key]);

                if (!empty($title) && !empty($description) && !empty($date)) {
                    if (!$this->adminModel->addEvent($title, $description, $date)) {
                        die('Something went wrong while adding the event.');
                    }
                }
            }

            redirect('admin/admin-dashboard');
        } else {
            redirect('admin/newsbanner');
        }
    }

    public function fashionAndBranding() {
        if (!isset($_SESSION['user_id'])) {
            redirect('admin/login');
        }

        $fashionArtImages = $this->adminModel->getFashionArtImages();
        $data = [
            'username' => $_SESSION['user_name'],
            'fashionArtImages' => $fashionArtImages
        ];

        $this->view('admin/fashionandbranding', $data);
    }

    public function uploadFashionArtImage() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    
            $data = [
                'image_title' => trim($_POST['image_title']),
                'image_description' => trim($_POST['image_description']),
                'image_file' => $_FILES['image_file'],
                'username' => $_SESSION['user_name'],
                'error' => ''
            ];
    
            // Maximale Dateigröße in Bytes (z.B. 5MB)
            $maxFileSize = 5 * 1024 * 1024;
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    
            if ($data['image_file']['size'] > $maxFileSize) {
                $data['error'] = 'Die Datei ist zu groß. Maximale Dateigröße ist 5MB.';
            } elseif (!in_array($data['image_file']['type'], $allowedTypes)) {
                $data['error'] = 'Nur JPEG-, PNG- und GIF-Dateien sind erlaubt.';
            } elseif (!empty($data['image_file']['name'])) {
                $target_dir = APPROOT . '/../public/uploads/'; 
                $filename = basename($data['image_file']['name']);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                $new_filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . time() . '.' . $extension;
                $target_file = $target_dir . $new_filename;
                $imageFileType = strtolower($extension);
    
                // Prüfen, ob die Datei ein Bild ist
                $check = getimagesize($data['image_file']['tmp_name']);
                if ($check !== false) {
                    // Bild verkleinern
                    if (resizeImage($data['image_file']['tmp_name'], $target_file, 300)) {
                        // Bildinformationen in der Datenbank speichern
                        if ($this->adminModel->addFashionArtImage($data['image_title'], $data['image_description'], $target_file)) {
                            redirect('admin/admin-dashboard');
                        } else {
                            $data['error'] = 'Fehler beim Speichern des Bildes in der Datenbank.';
                        }
                    } else {
                        $data['error'] = 'Fehler beim Verkleinern des Bildes.';
                    }
                } else {
                    $data['error'] = 'Die Datei ist kein Bild.';
                }
            }
    
            if (!empty($data['error'])) {
                $this->view('admin/fashionandbranding', $data);
            }
        } else {
            redirect('admin/fashionAndBranding');
        }
    }
    

    public function deleteEvent($id) {
        if (!isset($_SESSION['user_id'])) {
            redirect('admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->adminModel->deleteEvent($id)) {
                redirect('admin/dashboard');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('admin/admin-dashboard');
        }
    }
    public function deleteFashionArtImage($id) {
        if (!isset($_SESSION['user_id'])) {
            redirect('admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->adminModel->deleteFashionArtImage($id)) {
                redirect('admin/dashboard');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('admin/admin-dashboard');
        }
    }

    public function editEvent($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    
            $data = [
                'id' => $id,
                'title' => trim($_POST['event_title']),
                'description' => trim($_POST['event_description']),
                'date' => trim($_POST['event_date']),
                'title_err' => '',
                'description_err' => '',
                'date_err' => ''
            ];
    
            if (empty($data['title'])) {
                $data['title_err'] = 'Bitte geben Sie einen Titel ein';
            }
    
            if (empty($data['description'])) {
                $data['description_err'] = 'Bitte geben Sie eine Beschreibung ein';
            }
    
            if (empty($data['date'])) {
                $data['date_err'] = 'Bitte geben Sie ein Datum ein';
            }
    
            if (empty($data['title_err']) && empty($data['description_err']) && empty($data['date_err'])) {
                if ($this->adminModel->updateEvent($data)) {
                    redirect('admin/dashboard');
                } else {
                    die('Etwas ist schief gelaufen.');
                }
            } else {
                $this->view('admin/edit_event', $data);
            }
        } else {
            $event = $this->adminModel->getEventById($id);
    
            $data = [
                'id' => $id,
                'title' => $event->title,
                'description' => $event->description,
                'date' => $event->date,
                'title_err' => '',
                'description_err' => '',
                'date_err' => ''
            ];
    
            $this->view('admin/edit_event', $data);
        }
    }

    public function registerAdmin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $data = [
                'anrede' => isset($_POST['anrede']) ? trim($_POST['anrede']) : '',
                'firstname' => isset($_POST['firstname']) ? trim($_POST['firstname']) : '',
                'secondName' => isset($_POST['secondName']) ? trim($_POST['secondName']) : '',
                'nutzername' => isset($_POST['nutzername']) ? trim($_POST['nutzername']) : '',
                'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
                'password' => isset($_POST['password']) ? trim($_POST['password']) : '',
                'password_repeat' => isset($_POST['password_repeat']) ? trim($_POST['password_repeat']) : '',
                'agb' => isset($_POST['agb']) ? $_POST['agb'] : '',
                'errors' => []
            ];

            $this->validation->validateRequired('anrede', $data['anrede'], 'Bitte wählen Sie eine Anrede.');
            $this->validation->validateRequired('firstname', $data['firstname'], 'Bitte geben Sie Ihren Vornamen ein.');
            $this->validation->validateRequired('secondName', $data['secondName'], 'Bitte geben Sie Ihren Nachnamen ein.');
            $this->validation->validateUsername('nutzername', $data['nutzername'], 'Der Nutzername muss 4-16 Zeichen enthalten und darf keine Leerzeichen enthalten.');
            $this->validation->validateEmail('email', $data['email'], 'Bitte geben Sie eine gültige E-Mail-Adresse ein.');
            $this->validation->validatePassword('password', $data['password'], 'Das Passwort muss mindestens 8 Zeichen lang sein, einen Großbuchstaben, einen Kleinbuchstaben, eine Zahl und ein Sonderzeichen enthalten und darf keine Leerzeichen enthalten.');
            $this->validation->validateMatch('password_repeat', $data['password_repeat'], 'password', $data['password'], 'Die Passwörter stimmen nicht überein.');
            $this->validation->validateRequired('agb', $data['agb'], 'Sie müssen die AGB akzeptieren.');

            if ($this->validation->hasErrors()) {
                $data['errors'] = $this->validation->getErrors();
                $this->view('admin/regristrationsformular', $data);
            } else {
                if($this->adminModel->insertAdmin($data)) {
                    redirect('admin/admin-dashboard');
                } else {
                    die('Etwas ist schief gelaufen.');
                }
            }
        } else {
            $data = [
                'anrede' => '',
                'firstname' => '',
                'secondName' => '',
                'nutzername' => '',
                'email' => '',
                'password' => '',
                'password_repeat' => '',
                'agb' => '',
                'errors' => []
            ];

            $this->view('admin/regristrationsformular', $data);
        }
    }
    
    
}
?>
