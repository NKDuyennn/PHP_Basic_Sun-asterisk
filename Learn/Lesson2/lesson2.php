<?php
    # 1. Declare variables
    $txt = "Hello, World! \n";
    $x = 5;
    $y = 10.5;

    # 2. Data types
    $s = "Hello, World!";   // String
    $i = 42;                // Integer
    $f = 3.14;              // Float
    $b = true;              // Boolean
    $cars = array("Volvo", "BMW", "Toyota"); // Array
    // $herbie = new Car();    // Object
    $n = null;              // Null
    $resource = fopen("example.txt", "r"); // Resource

    var_dump($resource);    // Variable type and value
    // exit();                 // Thoát khỏi chương trình và không thực thi các dòng sau

    # 3. Arithmetic operations
    // Concatenation
    $greeting = "Hello, " . "World!";
    // Concatenation assignment
    $greeting .= " How are you?";

    # 4. Conditional statements
    // 4.1. The if statement
    $t = date("H");
    if ($t < 20) {
        echo "Have a good day! \n";
    } else {
        echo "Have a good night! \n";
    }

    // 4.2. The switch statement
    $favcolor = "red";
    switch ($favcolor){
        case "red":
            echo "Your favorite color is red! \n";
            break;
        case "blue":
            echo "Your favorite color is blue! \n";
            break;
        case "green":
            echo "Your favorite color is green! \n";
            break;
        default:
            echo "Your favorite color is neither red, blue, green! \n";
    }

    # 5. Loops
    // 5.1. The while loop
    $x = 1;
    while($x <= 5){
        echo "The number is: $x \n";
        $x++;
    } 

    // 5.2. The do..while loop
    $x = 1;
    do {
        echo "The number is: $x \n";
        $x++;
    } while ($x <=10 );

    // 5.3. The for loop
    for ($x = 0; $x <= 5; $x++) {
        echo "The number is: $x \n";
    }

    // 5.4. The foreach loop
    $color = array("red", "blue", "green", "yellow");
    foreach ($color as $value){
        echo "$value <br>";
    }
    echo "\n";

    # 6. Array
    $array = array();
    $array = [];

    // 6.1. Indexed Arrays
    $cars = array("Volvo", "BMW", "Toyota"); // Array  
    echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".\n";

    // 6.2. Associative Arrays
    $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
        // or
    $age['Peter'] = "35";
    $age['Ben'] = "37";
    $age['Joe'] = "43";

    echo "Peter is " . $age['Peter'] . " years old.";

    // 6.3. Multidimensional Arrays
    $cars = [
        ["Volvo", 22, 18],
        ["BMW", 15, 13],
        ["Saab", 5, 2],
        ["Land Rover", 17, 15]
    ];
    echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".\n";
    echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".\n";
    echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".\n";
    echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".\n";

    for ($row = 0; $row<4; $row++) {
        echo "<p><b>Row number $row</b></p>";
        echo "<ul>";
        for ($col = 0; $col < 3; $col++) {
            echo "<li>".$cars[$row][$col]."</li>";
        }
        echo "</ul>";
    }
    
?>
