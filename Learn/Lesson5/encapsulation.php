<?php
    # Tính đóng gói
    class Person {
        private $name;
        private $age;

        public function setName($name){
            $this->name = $name;
        }
        public function getName(){
            return $this->name;
        }
    }

    $p = new Person();
    $p->setName("Duyen");
    
    echo "Ten: " . $p->getName() . "\n";
?>