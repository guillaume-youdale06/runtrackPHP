<?php

$str = "Dans l'espace, personne ne vous entends crier";
$compteur = 0;

for ($i = 0; isset($str[$i]); $i++) {
    $compteur += 1;
}

echo $compteur;

?>