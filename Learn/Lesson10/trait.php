<?php
    trait ezcReflectionReturnInfo{
        public $name = "AAA";
        function getReturnType() {}
        function getReturnDescription(){}
    }

    class ezcReflectionMethod extends ReflectionMethod{
        use ezcReflectionReturnInfo;
    }

    class ezcReflectionFunction extends ReflectionFunction{
        use ezcReflectionReturnInfo;
    }

    # Thứ tự ưu tiên trait và inheritance
    // TH1
    trait HelloWorld{
        public function sayHello(){
            echo 'Hello World!';
        }
    }

    class TheWorldIsNotEnough{
        use HelloWorld;
        public function sayHello(){
            echo "Hello Universe!";
        }
    }

    $o = new TheWorldIsNotEnough();
    $o->sayHello();

    // TH2
    class Base{
        public function sayHello(){
            echo "Hello ";
        }
    }

    trait SayWorld {
        public function sayHello(){
            parent::sayHello();
            echo "World!";
        }
    }

    class MyHelloWorld extends Base{
        use SayWorld;
    }

    $o = new MyHelloWorld();
    $o->sayHello();

    # Multiple Traits
    trait Hello{
        public function sayHello(){
            echo "Hello ";
        }
    }

    trait World {
        public function sayWorld(){
            echo 'World';
        }
    }

    class MyHelloWorld0 {
        use Hello, World;
        public function sayHelloWorld(){
            echo '!';
        }
    }

    $o = new MyHelloWorld0();
    $o->sayHello();
    $o->sayWorld();
    $o->sayHelloWorld();

    # Giải quyết xung đột trait
    trait A{
        public function smallTalk(){
            echo 'a';
        }
        public function bigTalk(){
            echo 'A';
        }
    }

    trait B{
        public function smallTalk(){
            echo 'b';
        }
        public function bigTalk(){
            echo 'B';
        }
    }

    class Talker{
        use A,B{
            B::smallTalk insteadof A;
            A::bigTalk insteadof B;
            B::bigTalk as talk;
        }
    }

    # Trait sử dụng Trait
    trait HelloWorld0{
        use Hello, World;
    }

    class MyHelloWorld1{
        use HelloWorld0;
    }

    $o = new MyHelloWorld1();
    $o->sayHello();
    $o->sayWorld();

    # Abstract Trait Members
    trait Hello0{
        public function sayHelloWorld(){
            echo 'Hello' . $this->getWorld();
        }
        abstract public function getWorld();
    }

    class MyHelloWorld2{
        private $world;
        use Hello0;
        public function getWorld(){
            return $this->world;
        }
        public function setWorld($val){
            $this->world = $val;
        }
    }
?>  