<?php
class Admin extends Controller {
    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('AdminModel');
    }

    public function index() {
        $this->view('admin/admin-dashboard');
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

        $data = [
            'username' => $_SESSION['user_name']
        ];

        $this->view('admin/admin-dashboard', $data);
    }

    // Add the newsbanner method here
    public function newsbanner() {
        if (!isset($_SESSION['user_id'])) {
            redirect('admin/login');
        }

        $data = [
            'username' => $_SESSION['user_name']
        ];

        $this->view('admin/newsbanner', $data);
    }
}
?>
