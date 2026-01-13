<?php

if (isset($_COOKIE["nbvisites"])) {
   $nbvisites = $_COOKIE["nbvisites"];
} else {
   $nbvisites = 0;
}

if (isset($_POST["reset"])){
   setcookie("nbvisites", 0, time() + 3600);
   header("Location: ". $_SERVER["PHP_SELF"]);
   exit;
}

$nbvisites++;
setcookie("nbvisites", $nbvisites, time() + 3600);
echo $nbvisites;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Job07</title>
</head>
<body>

   <form action="" method="post">
        <button type = "submit" name = "reset">Reset</button>
   </form>

</body>
</html>