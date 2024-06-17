<?php
class Admin extends Controller {
    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('AdminModel');
    }

    public function index() {
        $this->dashboard();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];

            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            if ($this->adminModel->findUserByUsername($data['username'])) {
                // User found
            } else {
                $data['username_err'] = 'No user found';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->adminModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    error_log('Login successful for user: ' . $loggedInUser->username);
                    $this->createUserSession($loggedInUser);
                } else {
                    error_log('Login failed for user: ' . $data['username']);
                    $data['password_err'] = 'Password incorrect';
                    $this->view('admin/login', $data);
                }
            } else {
                $this->view('admin/login', $data);
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
        redirect('admin/dashboard');
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
}
?>
