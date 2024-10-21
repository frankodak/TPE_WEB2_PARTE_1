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

            // Verificar que el usuario está en la base de datos
            $userFromDB = $this->model->getUserByEmail($email);

            // Comparar la contraseña directamente (sin hash)
            if ($userFromDB && $password === $userFromDB->password) {
                session_start();
                $_SESSION['id_usuario'] = $userFromDB->id;
                $_SESSION['email'] = $userFromDB->email;

                // Redirigir al home
                header('Location: ' . BASE_URL);
                exit;
            } else {
                return $this->view->showLogin('Credenciales incorrectas');
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}
