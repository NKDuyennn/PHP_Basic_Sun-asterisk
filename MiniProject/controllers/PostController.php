<?php
    require_once('models/PostModel.php');
    session_start();

    class PostController {
        var $model;
        function __construct() {
            $this->model = new PostModel();
        }
        public function listAllPosts() {
            
            header('Location: index.php?controller=User&action=homepage');
            exit();
        }

        public function listMyPosts(){
            $data = $this->model->getPostsByAuthorId($_SESSION['user']['id']);
            require_once('views/post/listmypost.php');
        }

        public function detail(){
            $id = $_GET['id'];
            $data = $this->model->getPostById($id);
            require_once('views/post/detail.php');
        }

        public function add(){
            require_once('views/post/add.php');
        }

        public function store(){
            $data = $_POST;
            $status = $this->model->createPost($data);
            if ($status == true) {
                setcookie('msg', 'Post created successfully!', time() + 5, '/');
                header('Location: index.php?controller=Post&action=listMyPosts');
            } else {
                setcookie('msg', 'Failed to create post!', time() + 5, '/');
                header('Location: index.php?controller=Post&action=add');
            }
        }

        public function edit(){
            $id = $_GET['id'];
            $data = $this->model->getPostById($id);
            require_once('views/post/edit.php');
        }

        public function update(){
            $data = $_POST;
            $status = $this->model->updatePost($data);
            if ($status == true) {
                setcookie('msg', 'Post updated successfully!', time() + 5, '/');
                header('Location: index.php?controller=Post&action=listMyPosts');
            } else {
                setcookie('msg_fail', 'Failed to update post!', time() + 5, '/');
                header('Location: index.php?controller=Post&action=edit&id=' . $data['id']);
            }

        }

        public function delete(){
            $id = $_GET['id'];
            $status = $this->model->deletePost($id);
            if ($status == true) {
                setcookie('msg', 'Post deleted successfully!', time() + 5, '/');
            } else {
                setcookie('msg_fail', 'Failed to delete post!', time() + 5, '/');
            }
            header('Location: index.php?controller=Post&action=listMyPosts');
        }
        
    }
?>