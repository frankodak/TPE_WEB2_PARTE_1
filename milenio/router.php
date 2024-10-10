<?php
    include_once 'function.router.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


    if(!empty($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = 'home';
    }

    $params = explode('/', $action);
    
    switch ($params[0]) {
        case 'home':
            showHome();
            break;
        case 'login':
            showLogin();
            break;
        case 'addCatalogo':
            showAddCatalogo();
            break;
        case 'detail':
            if(isset($params[1])){
                showDetail($params[1]);
            }
            break;   
        default:
            showError();
            break;
    }

?>