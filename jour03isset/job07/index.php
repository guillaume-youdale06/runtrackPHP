<?php

$str = "Certaines choses changent, et d'autres ne changeront jamais.";

$resultat = "";
$compteur = 0;

for ($i = 0; isset($str[$i]); $i++) {
    $compteur += 1;
}

for ($i = 0; $i < $compteur; $i++) {
    if ($i + 1 < $compteur - 1) {
        $resultat .= $str[$i + 1];
    }  
}

$resultat .= $str[0];

echo $resultat;

?>