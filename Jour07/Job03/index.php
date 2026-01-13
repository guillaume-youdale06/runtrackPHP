<?php

session_start();

if (!isset($_SESSION["liste"])) {
   $_SESSION["liste"] = [];
}

if (isset($_POST["valide"])){
   $_SESSION["liste"][] = $_POST["prenom"];
}

if (isset($_POST["reset"])){
   $_SESSION["liste"] = [];
   header("Location: ". $_SERVER["PHP_SELF"]);
   exit;
}

for($i=0; isset($_SESSION["liste"][$i]); $i++) {
   echo $_SESSION["liste"][$i];
}
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
      <input type="text" name="prenom" placeholder="Votre prénom...">
      <button type = "submit" name = "valide">Valider</button>
      <button type = "submit" name = "reset">Reset</button>
   </form>

</body>
</html>