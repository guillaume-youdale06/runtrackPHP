<?php

session_start();

if (!isset($_SESSION["nbvisites"])) {
   $_SESSION["nbvisites"] = 0;
}

if (isset($_POST["reset"])){
   $_SESSION["nbvisites"] = 0;
   header("Location: ".$_SERVER["PHP_SELF"]);
   exit;
}

$_SESSION["nbvisites"]++;
echo $_SESSION["nbvisites"];
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