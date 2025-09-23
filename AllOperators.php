<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //http://ins3064.test/AllOperators.php?x=10&y=11
        $x = $_GET["x"];
        $y = $_GET["y"];
        // Arithmetric operators
        echo "$x + $y= " . ($x + $y) . "<br/>";
        echo "$x - $y= " . ($x - $y) . "<br/>";
        echo "$x / $y= " . ($x / $y) . "<br/>";
        echo "$x * $y= " . ($x * $y) . "<br/>";
        echo "$x % $y= " . ($x * $y) . "<br/>";
        // Comparison operators
        echo "$x == $y= " . ($x == $y) . "<br/>";
        echo "$x != $y= " . ($x != $y) . "<br/>";
        echo "$x < $y= " . ($x < $y) . "<br/>";
        echo "$x > $y= " . ($x > $y) . "<br/>";
        echo "$x <= $y= " . ($x <= $y) . "<br/>";
        echo "$x >= $y= " . ($x >= $y) . "<br/>";
        ?>
    </body>
</html>