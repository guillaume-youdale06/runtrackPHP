<?php

$tableau = [200, 204, 173, 98, 171, 404, 459];
for ($i = 0; $i < count($tableau); $i++) {
    if ($tableau[$i] % 2 == 0) {
        echo "X est paire<br>";
    } else {
        echo "X est impaire<br>";
    }
}

?>