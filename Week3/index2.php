<?php
$a = 4;
$b = 6;
$c = 2;
include ("func/func.php");
echo ("Number a is ". $a);
echo("<br>");
echo ("Number b is ". $b);
echo("<br>");
echo ("Number c is ". $c);
findsmallest($a, $b, $c);
swap($a, $b);
?>