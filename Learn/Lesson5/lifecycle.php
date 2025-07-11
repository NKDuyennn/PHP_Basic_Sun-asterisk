<?php
    class MyClass {
        function __contruct(){
            echo "Calling constructor \n";
        }
        function some_method(){
            echo "Calling a method \n";
        }
        function __destruct(){
            echo "Calling destructor \n";
        }
    }

?>