<?php

function occurences($str, $char) {
   $occ = 0;
   for($i=0; isset($str[$i]); $i++) {
      if (strtolower($str[$i]) == $char) {
         $occ++;
      }
   }
   return $occ;
}

$test = "Je suis une gentille chaine de caractere à tester";
$resultat = occurences($test, "b");
echo $resultat."<br>";
$resultat = occurences($test, "a");
echo $resultat."<br>";
$resultat = occurences($test, "l");
echo $resultat."<br>";
$resultat = occurences($test, "j");
echo $resultat."<br>";
$resultat = occurences($test, "t");
echo $resultat."<br>";
?>