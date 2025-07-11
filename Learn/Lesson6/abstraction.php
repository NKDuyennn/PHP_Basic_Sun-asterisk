<?php
    # Tính trừu tượng
    // Interface
    interface DongVat{
        public function getName();
    }

    interface ConTrau1 {
        public function checkSung();
    }

    interface ConTrau2 extends DongVat{
        public function checkSung();
    }

    // - Class dung vi da khai bao dinh nghia lai interface
    class ConBo implements DongVat{
        private $name;

        public function getName(){
            return $this->name;
        }
    }
    // - 1 class co the implements nhieu interface
    class ConNghe1 implements DongVat, ConTrau1{
        private $name;
        const SUNG=false;
        public function getName(){
            return $this->name;
        }
        public function checkSung(){
            return self::SUNG;
        }
    }

    // - 1 interface co the ke thua interface khac
    class ConNghe2 implements ConTrau2{
        private $name;
        const SUNG=false;
        public function getName(){
            return $this->name;
        }
        public function checkSung(){
            return self::SUNG;
        }
    }
    
    // Abstract Class
    // Giong su ket hop cua class va interface
    // Thuong la class cha 
    abstract class Animal{
        protected $name;

        // Yeu cau cac class con phai khai bao dinh nghia
        abstract protected function run();
        abstract protected function eat();

        public function showInfo(){
            echo "Hello, I am " . $this->name;
        }
    }

    class Cat extends Animal{
        public function run(){
            echo "Running on 4 legs";
        }
        public function eat(){
            echo "Cats love the fish.";
        }
    }

    class Bird extends Animal{
        protected function run(){
            echo "Flying with wings.";
        }
        public function eat(){
            echo "Birds eat seeds.";
        }
    }
?>