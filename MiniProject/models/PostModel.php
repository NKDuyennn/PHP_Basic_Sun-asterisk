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

        public function getPostById($id)
        {
            $con = $this->connect();
            $sql = "SELECT 
                        posts.*, 
                        users.username AS author_name, 
                        categories.name AS category_name 
                    FROM posts 
                    INNER JOIN users ON posts.author_id = users.id 
                    INNER JOIN categories ON posts.category_id = categories.id
                    WHERE posts.id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }

        public function getPostsByAuthorId($id)
        {
            $con = $this->connect();
            $sql = "SELECT 
                        posts.*, 
                        users.username AS author_name, 
                        categories.name AS category_name 
                    FROM posts 
                    INNER JOIN users ON posts.author_id = users.id 
                    INNER JOIN categories ON posts.category_id = categories.id
                    WHERE posts.author_id = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        

        public function createPost($data)
        {
            $con = $this->connect();

            $data['slug'] = $this->generateSlug($data['title']);
            if (empty($data['slug'])) {

                $data['slug'] = uniqid('post-');
            }

            // Upload thumbnail
            $thumbnailName = null;
            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
                $uploadDir = 'public/images/post/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true); // Tạo folder nếu chưa có
                }

                // Tạo tên file duy nhất để tránh trùng
                $fileExtension = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
                $thumbnailName = time() . '_' . $data['slug'] . '.' . $fileExtension;
                $uploadPath = $uploadDir . $thumbnailName;

                if (!move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadPath)) {
                    throw new Exception("Upload thumbnail failed!");
                }
            }
            $data['thumbnail'] = $thumbnailName;

            $data['author_id'] = $_SESSION['user']['id'];

            $sql = "INSERT INTO `posts` (title, slug, excerpt, content, thumbnail, author_id, category_id, status, created_at, updated_at, published_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), NOW())";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssssiis", $data['title'], $data['slug'], $data['excerpt'], $data['content'], $data['thumbnail'], $data['author_id'], $data['category_id'], $data['status']);
            $stmt->execute();

            return $stmt->affected_rows > 0;
        }


        public function generateSlug($string) {
            // Chuyển tiếng Việt có dấu thành không dấu
            $transliteration = array(
                'à'=>'a','á'=>'a','ạ'=>'a','ả'=>'a','ã'=>'a',
                'â'=>'a','ầ'=>'a','ấ'=>'a','ậ'=>'a','ẩ'=>'a','ẫ'=>'a',
                'ă'=>'a','ằ'=>'a','ắ'=>'a','ặ'=>'a','ẳ'=>'a','ẵ'=>'a',
                'è'=>'e','é'=>'e','ẹ'=>'e','ẻ'=>'e','ẽ'=>'e',
                'ê'=>'e','ề'=>'e','ế'=>'e','ệ'=>'e','ể'=>'e','ễ'=>'e',
                'ì'=>'i','í'=>'i','ị'=>'i','ỉ'=>'i','ĩ'=>'i',
                'ò'=>'o','ó'=>'o','ọ'=>'o','ỏ'=>'o','õ'=>'o',
                'ô'=>'o','ồ'=>'o','ố'=>'o','ộ'=>'o','ổ'=>'o','ỗ'=>'o',
                'ơ'=>'o','ờ'=>'o','ớ'=>'o','ợ'=>'o','ở'=>'o','ỡ'=>'o',
                'ù'=>'u','ú'=>'u','ụ'=>'u','ủ'=>'u','ũ'=>'u',
                'ư'=>'u','ừ'=>'u','ứ'=>'u','ự'=>'u','ử'=>'u','ữ'=>'u',
                'ỳ'=>'y','ý'=>'y','ỵ'=>'y','ỷ'=>'y','ỹ'=>'y',
                'đ'=>'d',
                'À'=>'A','Á'=>'A','Ạ'=>'A','Ả'=>'A','Ã'=>'A',
                'Â'=>'A','Ầ'=>'A','Ấ'=>'A','Ậ'=>'A','Ẩ'=>'A','Ẫ'=>'A',
                'Ă'=>'A','Ằ'=>'A','Ắ'=>'A','Ặ'=>'A','Ẳ'=>'A','Ẵ'=>'A',
                'È'=>'E','É'=>'E','Ẹ'=>'E','Ẻ'=>'E','Ẽ'=>'E',
                'Ê'=>'E','Ề'=>'E','Ế'=>'E','Ệ'=>'E','Ể'=>'E','Ễ'=>'E',
                'Ì'=>'I','Í'=>'I','Ị'=>'I','Ỉ'=>'I','Ĩ'=>'I',
                'Ò'=>'O','Ó'=>'O','Ọ'=>'O','Ỏ'=>'O','Õ'=>'O',
                'Ô'=>'O','Ồ'=>'O','Ố'=>'O','Ộ'=>'O','Ổ'=>'O','Ỗ'=>'O',
                'Ơ'=>'O','Ờ'=>'O','Ớ'=>'O','Ợ'=>'O','Ở'=>'O','Ỡ'=>'O',
                'Ù'=>'U','Ú'=>'U','Ụ'=>'U','Ủ'=>'U','Ũ'=>'U',
                'Ư'=>'U','Ừ'=>'U','Ứ'=>'U','Ự'=>'U','Ử'=>'U','Ữ'=>'U',
                'Ỳ'=>'Y','Ý'=>'Y','Ỵ'=>'Y','Ỷ'=>'Y','Ỹ'=>'Y','Đ'=>'D'
            );
            $string = strtolower(strtr($string, $transliteration));

            // Loại bỏ ký tự đặc biệt
            $string = preg_replace('/[^a-z0-9\s-]/', '', $string);

            // Thay khoảng trắng và dấu _ bằng dấu -
            $string = preg_replace('/[\s_]+/', '-', $string);

            // Loại bỏ dấu - dư ở đầu và cuối
            $string = trim($string, '-');

            return $string;
        }
        
    }

    
?>