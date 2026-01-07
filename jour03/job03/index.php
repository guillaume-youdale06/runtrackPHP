<?php

#AVEC FONCTIONS SYSTEMES

$str = "I'm sorry Dave I'm afraid I can't do that";
$voyelles = ["a", "A", "e", "E", "i", "I", "o", "O", "u", "U", "y", "Y"];
for ($i = 0; $i < strlen($str); $i++) {
    for ($y = 0; $y < count($voyelles); $y++) {
        if (strtolower($str[$i]) == $voyelles[$y]) {
            echo $str[$i];
            break;
        }
    }
}

#SANS FONCTIONS SYSTEMES

echo "<br>";
$teststr = "";
$testvoyelles = [];
$compteurstr = 0;
$compteurvoyelles = 0;

for ($i = 0; $teststr != $str; $i++) {
    $teststr .= $str[$i];
    $compteurstr += 1;
}

echo $str."<br>";

for ($i = 0; $testvoyelles != $voyelles; $i++) {
    $testvoyelles[$i] = $voyelles[$i];
    $compteurvoyelles += 1;
}


for ($i = 0; $i < $compteurstr; $i++) {
    for ($y = 0; $y < $compteurvoyelles; $y++) {
        if ($str[$i] == $voyelles[$y]) {
            echo $str[$i];
            break;
        }
    }
}


?>