<?php

session_start();
require "connexion.php";


if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

$id = $_SESSION["id"];
$nom = $_SESSION["username"];

if (isset($_POST["deco"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

if (isset($_POST["envoyer"])){
    $sql = "DELETE FROM utilisateurs WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->execute([":id"=>$id]);
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h1>Votre profil</h1>
    <?php echo "Bienvenue, " . htmlspecialchars($nom) . " !"; ?><br><br>

    <form action="modif.php" method="post">
        <button type="submit">Modifier votre profil</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="deco">Se déconnecter</button>
    </form>

    <form action="" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre profil ? Cette action est irréversible !');">
        <button type="submit" name="envoyer">Supprimer votre profil</button>
    </form>

</body>
</html>