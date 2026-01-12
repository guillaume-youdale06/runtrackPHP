<?php

function leet($str) {
   $alphabet = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"," "];
   $leet = ["4","8","(","[)","3","|=","6","#","|","_/","|<","|_","|v|","|\|","0","|*","0_","|?","5","7","|_|","\/","\/\/","><","'/","7_'"," "];
   $str = strtolower($str);
   $resultat = "";
   for($i=0; isset($str[$i]); $i++) {
      for($y=0; isset($alphabet[$y]); $y++) {
         if ($str[$i] == $alphabet[$y]) {
            $resultat .= $leet[$y];
         }
      }
   }
   return $resultat;
}

$test1 = "Je suis une gentille chaine de caractere a tester";
$test2 = "excess luggage";

echo $test1."<br>";
$valeur = leet($test1);
echo $valeur."<br><br>";

echo $test2."<br>";
$valeur = leet($test2);
echo $valeur;
?>