<?php

for ($i = 2; $i <= 1000; $i++) {
    $condition = true;
    for ($y = 2; $y < $i; $y++) {
        if ($i % $y == 0) {
            $condition = false;
            break;
        }
    }
    if ($condition) {
        echo $i."<br>";
    }
}

?>