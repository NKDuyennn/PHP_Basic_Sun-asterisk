<?php
    require_once('DbModel.php');

    class PostModel extends DbModel {
        public function getAllPosts()
        {
            $con = $this->connect();
            $sql = "SELECT 
                        posts.*, 
                        users.username AS author_name, 
                        categories.name AS category_name 
                    FROM posts 
                    INNER JOIN users ON posts.author_id = users.id 
                    INNER JOIN categories ON posts.category_id = categories.id";
            $stmt = $con->prepare($sql);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>