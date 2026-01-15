<?php

session_start();

if (!isset($_SESSION["nbtours"])) {
   $_SESSION["nbtours"] = 0;
}

if (isset($_POST["reset"])){
   $_SESSION["nbtours"] = 0;
   for ($i = 0; $i < 9; $i++) {
      setcookie("$i", "", time() - 3600);
   }
   header("Location: ".$_SERVER["PHP_SELF"]);
   exit;
}

for ($i = 0; $i < 9; $i++) {
    if (isset($_POST[$i]) && !isset($_COOKIE[$i])) {

        $symbole = ($_SESSION["nbtours"] % 2 == 0) ? "X" : "O";

        setcookie("$i", $symbole, time() + 3600);
        $_COOKIE["$i"] = $symbole;

        $_SESSION["nbtours"]++;

        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }
}

$i = 0;
foreach($_POST as $value) {
   setcookie($value, $symbole, time() + 3600);
}

$combinaison = [
   ["0", "1", "2"],
   ["3", "4", "5"],
   ["6", "7", "8"],
   ["0", "3", "6"],
   ["1", "4", "7"],
   ["2", "5", "8"],
   ["0", "4", "8"],
   ["2", "4", "6"]
];

$plateau = [null,null,null,null,null,null,null,null,null];
$victoire = false;
foreach ($_COOKIE as $key => $value) {
   if ($key >= '0' && $key <= '8') {
      $plateau[$key] = $value;
   }
}

foreach($combinaison as $value) {
   if($plateau[$value[0]] == "X" && $plateau[$value[1]] == "X" && $plateau[$value[2]] == "X") {
      $victoire =true;
      echo "Victoire des X !";
   }
   if($plateau[$value[0]] == "O" && $plateau[$value[1]] == "O" && $plateau[$value[2]] == "O") {
      $victoire =true;
      echo "Victoire des O !";
   }
}




?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Job05</title>
</head>
<body>
   <form action="" method="post">
         <?php
         if (!$victoire) {
            echo "<table border=1>";
            for ($i = 0; $i < 9; $i++) {
               if ($i % 3 === 0) echo "<tr>";

               echo "<td>";
               if (!isset($_COOKIE["$i"])) {
                  echo "<button type='submit' name='$i'>Clique!</button>";
               } else {
                  echo $_COOKIE["$i"];
               }
               echo "</td>";
               if ($i % 3 === 2) echo "</tr>";
            }
            echo "</table>";
         }
         ?>
      <button type="submit" name="reset">Reset</button>
   </form>
   
</body>
</html>