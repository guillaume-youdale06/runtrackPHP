<?php

function bonjour($jour) {
    if ($jour) {
        echo "Bonjour";
    } else {
        echo "Bonsoir";
    }
}

bonjour(true);
echo "<br>";
bonjour(false);
echo "<br>";
bonjour("bonjour");
echo "<br>";
bonjour("bonsoir");
?>