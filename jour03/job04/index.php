<?php

$str = "Dans l'espace, personne ne vous entends crier";
$test = "";
$compteur = 0;

for ($i = 0; $test != $str; $i++) {
    $test .= $str[$i];
    $compteur += 1;
}

echo $compteur;

?>