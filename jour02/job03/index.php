<?php

for ($i = 0; $i <= 100; $i++) {
    if ($i <= 20) {
        echo "<em>".$i."</em><br>";
    }
    else if (25 <= $i && $i<= 50 && $i != 42) {
        echo "<u>".$i."</u><br>";
    }
    else if ($i == 42) {
        echo "LaPlateforme_<br>";
    }
    else {
        echo $i."<br>";
    }
}

?>