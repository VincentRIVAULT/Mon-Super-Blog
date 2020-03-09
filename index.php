<?php

    session_start();

    // session_destroy();

    // var_dump($_SESSION);

    include 'Controller/Controller.php';
    include 'Model/Model.php';
    include 'View/View.php';
    

    include 'Controller/NewController.php';
    include 'Controller/CategoryController.php';
    include 'Controller/UserController.php';
    include 'Controller/SecurityController.php';


    if (isset($_GET['controller'])) {
        $controllerStart = ucfirst($_GET['controller']) . "Controller";
    } else {
        $controllerStart = 'NewController';
    }

    
    if (!isset($_SESSION['user']) && ($controllerStart != 'SecurityController')) {
        // header('location: index.php?controller=new&action=start');
        $controllerStart = 'NewController';
        $_GET['action'] = 'start';    
    }

    if (!isset($_SESSION['user']) && ($_GET['action'] != 'start' && $_GET['action'] != 'formLogin' && $_GET['action'] != 'login')) {
        $controllerStart = 'NewController';
        $_GET['action'] = 'start';
    }

    $controller = new $controllerStart();
    
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'start';
    }
    // var_dump($action);


    // $action() définit la valeur contenue dans la méthode "$action()"
    $controller->$action();
