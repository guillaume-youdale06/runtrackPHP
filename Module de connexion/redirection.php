<?php

session_start();

if (!isset($_SESSION["valide"])) {
    header("Location: login.php");
    exit;
}

if(isset($_SESSION["pageADMIN"])) {
    unset($_SESSION["pageADMIN"]);
    header("Location: admin.php");
    exit;
}

$message = $_SESSION["valide"];
unset($_SESSION["valide"]);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirection</title>
    <meta http-equiv="refresh" content="3;url=profil.php">
</head>
<body>

    <p><?= htmlspecialchars($message) ?></p>
    <p>Redirection vers votre profil dans 3 secondes...</p>
    
</body>
</html>
