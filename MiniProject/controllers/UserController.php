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
            // Logic for user login
            require_once('views/Login.php');
        }
    }
?>