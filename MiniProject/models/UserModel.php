<?php
    require_once('DbModel.php');
    class UserModel extends DbModel{

        public function getUserbyUsername($username)
        {
            $con = $this->connect();
            $sql = "SELECT * FROM `users` WHERE username = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
        
        public function getUserLogin($username, $password)
        {
            $con = $this->connect();
            
            $sql = "SELECT * FROM `users` WHERE username = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user && $password === $user['password']) {
                echo "User found: " . $user['username'] . "<br>";
                return $user; 
            } else {
                return false;
            }
        }

        public function createUser($data)
        {
            $con = $this->connect();
            $sql = "INSERT INTO `users` (first_name, last_name, email, username, password, role, status)
                    VALUES (?, ?, ?, ?, ?, ?, 1)"; // Assuming status is always 1 for active users
            
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssssss", $data['first_name'], $data['last_name'], $data['email'], $data['username'], $data['password'], $data['role']);
            $stmt->execute();
            
            $result = $stmt->affected_rows;

            print_r($result);

            if ($result > 0) {
                return true; // User created successfully
            } else {
                return false; // Failed to create user
            }

        }
    }
?>