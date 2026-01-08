<?php

$str = "I'm sorry Dave I'm afraid I can't do that";
$voyelles = ["a", "A", "e", "E", "i", "I", "o", "O", "u", "U", "y", "Y"];

for ($i = 0; isset($str[$i]); $i++) {
    for ($y = 0; isset($voyelles[$y]); $y++) {
        if ($str[$i] == $voyelles[$y]) {
            echo $str[$i];
            break;
        }
    }
}

?>