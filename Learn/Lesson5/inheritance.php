<?php
    # Tính kế thừa
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
        public function callParentPrintItem($string){
            parent::printItem($string);
        }
    }

    $foo = new Foo();
    $bar = new Bar();
    $foo->printItem('baz');
    $foo->printPHP();
    $bar->printItem('baz');
    $bar->printPHP();

    $bar->callParentPrintItem('baz');
?>
