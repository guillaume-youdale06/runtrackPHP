<?php

function calcul($a, $operande, $b) {
   $lstoperande = ["+", "-", "*", "/", "%"];
   $i = 0;
   for($i=0; isset($lstoperande[$i]); $i++) {
      if ($operande == $lstoperande[$i]){
         if ($i == 0) {
            return $a + $b;
         }
         else if ($i == 1) {
            return $a - $b;
         }
         else if ($i == 2) {
            return $a * $b;
         }
         else if ($i == 3 && $b != 0) {
            return $a / $b;
         }
         else if ($b != 0) {
            return $a % $b;
         } else {
            return "L'opération est impossible à effectuer";
         }
      }
   }
}

$valeur1 = calcul(36, "+", 22);
echo $valeur1."<br>";
$valeur2 = calcul(34, "/", 0);
echo $valeur2."<br>";
$valeur3 = calcul(43, "%", 2);
echo $valeur3."<br>";
$valeur4 = calcul(3, "*", 2);
echo $valeur4;
?>