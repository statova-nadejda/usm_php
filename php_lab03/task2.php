<?php

$a = 0;
$b = 0;
function forLoopTest(): void
{
    global $a, $b;

    echo "\n--------Testing FOR loop-------- \n";

    for ($i = 0; $i <= 5; $i++) {
        $a += 10;
        $b += 5;

        echo "Iteration № $i: \n";
        echo "A is equal to $a \n";
        echo "B is equal to $b \n \n";
    }
    echo "End of the loop: a = $a, b = $b";
}

function whileLoopTest(): void
{
    global $a, $b;
    $i = 0;

    echo "\n --------Testing WHILE loop-------- \n";

    while($i <= 5){
        $a += 10;
        $b += 5;
        $i++;

        echo "Iteration № $i: \n";
        echo "A is equal to $a \n";
        echo "B is equal to $b \n \n";


    }
    echo "End of the loop: a = $a, b = $b";
}

function doWhileLoopTest(): void
{
    global $a, $b;
    $i = 0;

    echo "\n --------Testing DO_WHILE loop-------- \n";

    do {
        $a += 10;
        $b += 5;
        $i++;

        echo "Iteration № $i: \n";
        echo "A is equal to $a \n";
        echo "B is equal to $b \n";
    } while ($i <= 5);

    echo "End of the loop: a = $a, b = $b";
}

//forLoopTest();
whileLoopTest();
//doWhileLoopTest();
