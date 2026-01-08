<?php

$str = "Les choses que l'on possède finissent par nous posséder.";

$test = "";
$resultat = "";
$compteur = 0;

$encoding = "UTF-8";

for ($i = 0; isset($str[$i]); $i++) {
    $compteur += 1;
}

for ($i = $compteur; $i != 0; $i--) {
    if (isset($str[$i - 1])) {
        $resultat .= mb_substr($str, $i - 1, 1, $encoding); #seule fonction que j'utilise --> dur de réaliser l'exercice sans
    }
}

echo $resultat;
?>