<?php
function swap($a, $b) {
$stemp = $a;
$a = $b;
$b = $stemp;
echo("<br>After swap a and b <br>");
echo ("Number a is ". $a);
echo("<br>");
echo ("Number b is ". $b);
}
function findsmallest($a, $b, $c) {
if ($a < $b && $a < $c) {
echo ("<br>The number a = ". $a ." is the smallest");
}
if ($b < $c && $b < $a) {
echo ("<br>The number b = ". $b ." is the smallest");
}
echo ("<br>The number c = ". $c ." is the smallest");
}
?>