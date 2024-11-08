<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';

class AuthController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        return $this->view->showLogin();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                return $this->view->showLogin('Falta completar el email del usuario');
            }
    
            if (!isset($_POST['password']) || empty($_POST['password'])) {
                return $this->view->showLogin('Falta completar la contraseña');
            }
    
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            $userFromDB = $this->model->getUserByEmail($email);
    
            if ($userFromDB) {
                if (password_verify($password, $userFromDB->password)) {
                    session_start();
                    $_SESSION['id_usuario'] = $userFromDB->id_usuario;
                    $_SESSION['email'] = $userFromDB->email;
                    header('Location: ' . BASE_URL);
                    exit;
                } else {
                    return $this->view->showLogin('Credenciales incorrectas');
                }
            } else {
                $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
                $userName = explode('@', $email)[0];
   
                $this->model->registerUser($email, $userName, $passwordHashed);
                $userFromDB = $this->model->getUserByEmail($email);
    
                session_start();
                $_SESSION['id_usuario'] = $userFromDB->id_usuario;
                $_SESSION['email'] = $userFromDB->email;
                header('Location: ' . BASE_URL);
                exit;
            }
        }
    }
    

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
