<?php
    # 1. Function
    function writeMessage() {
        echo "Hello world! \n";
    }

    writeMessage();

    // 1.1. Function arguments
    function familyName($fname, $year) {
        echo "$fname Refsnes. Born in $year \n";
    }

    familyName("Hege", "1975");
    familyName("Stale", "1978");
    familyName("Kai Jim", "1983");

    // 1.2. Default argument value
    function setHeight($minheight = 50) {
        echo "The height is : $minheight \n";
    }

    setHeight(350);
    setHeight();

    // 1.3. Function Returning values
    function sum($x, $y) {
        $z = $x + $y;
        return $z;
    }
    echo "5 + 10 = " . sum(5, 10) . "\n";
    echo "7 + 13 = " . sum(7, 13) . "\n";
    echo "2 + 4 = " . sum(2, 4) . "\n";


    # 2. Include files
    
?>