<?php
    require_once 'libs/response.php';
    require_once 'app/middlewares/session.auth.middleware.php';
    require_once 'app/middlewares/verify.auth.middleware.php';
    require_once 'app/controllers/auth.controller.php';
    require_once 'app/controllers/catalogo.controller.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $res = new Response();

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home';
    }

    $params = explode('/', $action);
    
    switch ($params[0]) {
        case 'home':
            sessionAuthMiddleware($res);
            $controller = new CatalogoController($res);
            $controller->showLibros();
            break;
        case 'showLogin':
            $controller = new AuthController();
            $controller->showLogin();
            break;
        case 'login':
            $controller = new AuthController();
            $controller->login();
            break;
        case 'logout':
            $controller = new AuthController();
            $controller->logout();
            break;
        case 'addCatalogo':
            sessionAuthMiddleware($res);
            $controller = new CatalogoController($res);
            $controller->addCatalogo();
            break;
        case 'detail':
            sessionAuthMiddleware($res);
            if (isset($params[1])) {
                $controller = new CatalogoController($res);
                $controller->showDetail($params[1]);
            } else {
                $controller->showError();
            }
            break;
        default:
            $controller->showError();
            break;
    }
?>
