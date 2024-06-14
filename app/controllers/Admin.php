<?php
class Admin extends Controller {
    private $adminModel;

    public function __construct() {
        $this->adminModel = $this->model('AdminModel');
    }

    public function index() {
        // Default method
        $this->view('admin/admin-dashboard');
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'username_err' => '',
                'password_err' => ''
            ];

            // Validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'Please enter username';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Check for user
            if ($this->adminModel->findUserByUsername($data['username'])) {
                // User found
            } else {
                $data['username_err'] = 'No user found';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                // Check and set logged in user
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
                // Load view with errors
                $this->view('admin/login', $data);
            }
        } else {
            // Init data
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => ''
            ];

            // Load view
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
        redirect('admin/login');
    }

    public function dashboard() {
        if (!isset($_SESSION['user_id'])) {
            redirect('admin/login');
        }

        $this->view('admin/admin-dashboard');
    }
}
?>
