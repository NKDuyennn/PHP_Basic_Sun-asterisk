<?php
    require_once('models/PostModel.php');
    session_start();

    class PostController {
        var $model;
        function __construct() {
            $this->model = new PostModel();
        }

    }
?>