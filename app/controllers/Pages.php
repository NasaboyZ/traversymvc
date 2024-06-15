<?php
class Pages extends Controller {
    private $validation;
    private $adminModel;

    public function __construct(){
        $this->validation = new Validation();
        $this->adminModel = $this->model('AdminModel');
    }

    public function index(){
        $events = $this->adminModel->getAllEvents();

        $data = [
            'title' => 'MueWear Collectiv',
            'events' => $events
        ];
        $this->view('pages/index', $data);
    }

    public function about(){
        $data = [
            'title' => 'About Us'
        ];
        $this->view('pages/about', $data);         
    }

    public function fashionArt(){
        $data = [
            'title' => 'Fashion & Art'
        ];
        $this->view('pages/fashion-and-art', $data);
    }

    public function community(){
        $data = [
            'title' => 'Community'
        ];
        $this->view('pages/community', $data);
    }

    public function login(){
        $data = [
            'title' => 'Login'
        ];
        $this->view('pages/login', $data);
    }

    public function kontaktFormular(){
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
                $this->view('pages/kontakt-formular', $data);
            } else {
                if($this->adminModel->insertAdmin($data)) {
                    redirect('pages/success');
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

            $this->view('pages/kontakt-formular', $data);
        }
    }
}
?>
