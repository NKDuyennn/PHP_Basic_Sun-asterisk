<?php

    function inverse($x) {
        // Throw exception
        if (!$x){
            throw new Exception('Division by zero.');
        }
        return 1/$x;

    }

    // try{} catch{} finally{}

    try{
        echo inverse(5) . "\n";
    } catch (Exception $e){
        echo 'Caught exception: ' . $e->getMessage(), "\n";
    } finally {
        echo "First finally. \n";
    }

    try{
        echo inverse(0) . "\n";
    } catch (Exception $e){
        echo 'Caught exception: ' . $e->getMessage(), "\n";
    } finally {
        echo "Second finally. \n";
    }

    echo "Hello World\n";

    // try catch lồng nhau - Nested exception
    class MyException extends Exception{};

    class Test{
        public function testing(){
            try{
                try{
                    throw new MyException('foo!');
                } catch (Exception $e){
                    throw $e;
                }
            } catch (Exception $e){
                var_dump($e->getMessage());
            }
        }
    }

    $foo = new Test;
    $foo->testing();
    
?>