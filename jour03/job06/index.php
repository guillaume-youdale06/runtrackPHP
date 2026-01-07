<?php

$str = "Les choses que l'on possède finissent par nous posséder.";

$test = "";
$resultat = "";
$compteur = 0;

$encoding = "UTF-8";

for ($i = 0; $test != $str; $i++) {
    $compteur += 1;
    $test .= $str[$i];
}

for ($i = $compteur; $i != 0; $i--) {
    if (isset($str[$i - 1])) {
        $resultat .= mb_substr($str, $i - 1, 1, $encoding);
    }
}

echo $resultat;
?>