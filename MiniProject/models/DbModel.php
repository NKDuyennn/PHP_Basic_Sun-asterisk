<?php
    
    class DbModel{
        public function connect(){
            $con = mysqli_connect('localhost', 'root', '', 'simple_blog');
            if (mysqli_connect_errno()){
                echo "Ket noi that bai ";
            }
            return $con;
        }
    }
?>