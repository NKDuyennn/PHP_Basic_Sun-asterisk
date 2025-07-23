<?php
    require_once('models/UserModel.php');
    require_once('models/PostModel.php');
    session_start();
    class UserController{
        var $model;
        var $postModel;

        public function __construct(){
            $this->model = new UserModel();
            $this->postModel = new PostModel();
        }

        public function login(){
            

            if (isset($_SESSION['user']) && $_SESSION['user']!=null){
                // echo "Welcome back, " . $_SESSION['user']['username'] . "!";
                header('Location: index.php?controller=User&action=homepage');
                exit();
            }
            
            if (isset($_POST['btnLogin'])){
                $username = isset($_POST['username']) ? $_POST['username'] : '';
                $password = isset($_POST['password']) ? $_POST['password'] : '';
                // echo $username;
                // echo $password;
                if ($password){
                    $password = md5($password);
                }
                if($password != '' && $username != ''){
                    $user = $this->model->getUserLogin($username, $password);
                    // echo var_dump($user);
                    if ($user) {
                        $_SESSION['user'] = $user; 

                        if (isset($_POST['remember'])) {
                            
                            setcookie('remember_username', $username, time() + (86400 * 30)); // 30 days
                            setcookie('remember_password', $_POST['password'], time() + (86400 * 30)); // 30 days
                        } else {
                            
                            setcookie('remember_username', '', time() - 3600);
                            setcookie('remember_password', '', time() - 3600);
                        }


                        $message = "Login successful!";
                        $_SESSION['message'] = $message;
                        header('Location: index.php?controller=User&action=homepage'); 
                        exit();
                    } else {
                        $message = "Login failed!";
                        $message = $message . "<br>Please check your username and password.";
                        $_SESSION['message'] = $message;
                        require_once('views/Login.php');
                    }
                } else {
                    require_once('views/Login.php');
                }
            } else {
                require_once('views/Login.php');
            }
        }

        public function register(){

            if (isset($_SESSION['user']) && $_SESSION['user']!=null){
                header('Location: index.php?controller=User&action=homepage');
                exit();
            }
            if (isset($_POST['btnRegister'])){
                $data = $_POST;

                $existingUser = $this->model->getUserbyUsername($data['username']);
                if ($existingUser) {
                    setcookie('msg', 'Username already exists!', time()+5);
                    header('Location: index.php?controller=User&action=register');
                    exit();
                }

                $data['password'] = md5($data['password']);
                $data['password_again'] = md5($data['password_again']);

                if ($data['password'] != $data['password_again']){
                    setcookie('msg', 'Passwords do not match!', time()+5);
                    header('Location: index.php?controller=User&action=register');
                    exit();
                }
                

                $result = $this->model->createUser($data);

                if ($result){
                    setcookie('msg', 'Registration successsful!', time()+5);
                    header('Location: index.php?controller=User&action=login');
                    exit();
                } else {
                    setcookie('msg', 'Registration failed!', time()+5);
                    header('Location: index.php?controller=User&action=register');
                    exit();
                }

            } else {
                if (isset($_COOKIE['msg'])) {
                    echo '<div class="alert alert-danger">' . $_COOKIE['msg'] . '</div>';
                    setcookie('msg', '', time() - 3600); // Clear the cookie after displaying
                }
                require_once('views/Register.php');
            }
        }

        public function logout(){
            session_destroy();
            header('Location: index.php?controller=User&action=login'); // Redirect to login page
            exit();
        }

        public function homepage(){
            if (isset($_SESSION['user'])) {
                $data = $this->postModel->getAllPosts(); 
                // echo "Welcome, " . $_SESSION['user']['username'] . "!";
                require_once('views/Homepage.php');
            } else {
                header('Location: index.php?controller=User&action=login'); // Redirect to login if not logged in
            }
        }
    }
?>

