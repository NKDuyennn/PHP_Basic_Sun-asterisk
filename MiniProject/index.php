<?php 

    //echo md5('user');

    $controller = isset($_GET['controller'])? $_GET['controller'] . 'Controller' : 'UserController';
    $action = isset($_GET['action'])? $_GET['action']: 'login';

    switch ($controller){
        case 'UserController':
        require_once('controllers/UserController.php');
        $usercontroller = new UserController();

        switch ($action){
            case 'login':
                $usercontroller->login();
                break;
            case 'register':
                $usercontroller->register();
                break;
            case 'homepage':
                $usercontroller->homepage();
                break;
            case 'logout':
                $usercontroller->logout();
                break;
            default:
                $usercontroller->login();
                break;
        }
        break;

        case 'PostController':
        require_once('controllers/PostController.php');
        $postcontroller = new PostController();
        switch ($action){
            case 'listAllPosts':
                $postcontroller->listAllPosts();
                break;
            case 'listMyPosts':
                $postcontroller->listMyPosts();
                break;
            case 'detail':
                $postcontroller->detail();
                break;
            case 'add':
                $postcontroller->add();
                break;
            case 'store':
                $postcontroller->store();
                break;
            case 'edit':
                $postcontroller->edit();
                break;
            case 'update':
                $postcontroller->update();
                break;
            case 'delete':
                $postcontroller->delete();
                break;
            default:
                $postcontroller->listAllPosts();
                break;
        }
    }
?>