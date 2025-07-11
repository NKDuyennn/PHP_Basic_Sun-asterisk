<?php
    # Tính đa hình
    // 1. Overriding Methods
    class Foo {
        public function printItem($string){
            echo "Foo: " . $string . PHP_EOL;
        }

        public function printPHP() {
            echo "PHP is great. " . PHP_EOL;
        }

    }

    class Bar extends Foo {
        public function printItem($string){
            echo "Bar: " . $string . PHP_EOL;
        }
        
    }

    // Overloading Methods with Magic Method
    class Calculator {
        // Magic Method __call
        public function __call($name, $arguments){
            if($name == 'add'){
                $count = count($arguments);

                if ($count == 2){ 
                    return $arguments[0] + $arguments[1];
                } elseif ($count == 3){
                    return $arguments[0] + $arguments[1] + $arguments[2];
                } else {
                    return "Khong du tham so de cong. \n";
                }
            } else {
                return "Phuong thuc khong ton tai \n";
            }
        }
    }

    $calc = new Calculator();
    echo $calc->add(5,10) . "\n";
    echo $calc->add(1, 2, 3) . "\n";
    echo $calc->add(7) . "\n";
    echo $calc->subtract(5,3) . "\n";

?>