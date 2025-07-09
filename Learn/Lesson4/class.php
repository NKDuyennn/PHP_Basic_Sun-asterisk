<?php
    # Class definition
    class SimpleClass {
        // property declaration
        public $var = 'a default value';

        // method declaration
        public function displayVar(){
            echo $this->var;
        }
    }

    // 3.1. Phuong thuc Khởi tạo
    class Person {
        private $name;
        private $age;
        
        public function __construct ($name = null, $age = null) {
            $this->name = $name;
            $this->age = $age;
        }

        public function sayHello() {
            return "Hello World! \n";
        }

        public function getAge() {
            return $this->age;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

    }
    // 3.2. Contructor
    class BaseClass {
        private $propertyName;

        public function __construct($variableValue) {
            $this->propertyName = $variableValue;
        }
    }

    // 3.3. Create and use Objects
    $p1 = new Person();
    $p2 = new Person("Nam", "20");

    $person = new Person();
    $person->setName("Nam");
    $name = $person->getName();

    echo $person->getName() . "\n";

    $person1 = new Person();
    echo $person1->sayHello();

?>