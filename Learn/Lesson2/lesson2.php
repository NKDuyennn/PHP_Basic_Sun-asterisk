<?php
    # Declare variables
    $txt = "Hello, World!";
    $x = 5;
    $y = 10.5;

    # Data types
    $s = "Hello, World!";   // String
    $i = 42;                // Integer
    $f = 3.14;              // Float
    $b = true;              // Boolean
    $cars = array("Volvo", "BMW", "Toyota"); // Array
    // $herbie = new Car();    // Object
    $n = null;              // Null
    $resource = fopen("example.txt", "r"); // Resource

    var_dump($variable);    // Variable type and value
    exit();                 // Exit the script 

    # Arithmetic operations
    // Concatenation
    $greeting = "Hello, " . "World!";
    // Concatenation assignment
    $greeting .= " How are you?";

    # Conditional statements
    // The if statement
    $t = date("H");
    if ($t < 20) {
        echo "Have a good day!";
    } else {
        echo "Have a good night!";
    }

?>
