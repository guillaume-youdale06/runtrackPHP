<?php

$str = "Certaines choses changent, et d'autres ne changeront jamais.";

$test = "";
$resultat = "";
$compteur = 0;

$encoding = "UTF-8";

for ($i = 0; $test != $str; $i++) {
    $compteur += 1;
    $test .= $str[$i];
}

for ($i = 0; $i < $compteur; $i++) {
    if ($i + 1 < $compteur - 1) {
        $resultat .= $str[$i + 1];
    }  
}

$resultat .= $str[0];

echo $resultat;
?>