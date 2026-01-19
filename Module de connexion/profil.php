<?php

session_start();
require "connexion.php";

//Vérifie si l'utilisateur est connecté
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

//Variables de $_SESSION
$idUtilisateur = $_SESSION["id"];
$id = $_SESSION["login"];
$prenom = $_SESSION["prenom"];
$nom = $_SESSION["nom"];

//Vérifie si l'utilisateur veut se déconnecter
if (isset($_POST["deco"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

if(isset($_POST["admin"])) {
    $_SESSION["valide"] = "";
    $_SESSION["pageADMIN"] = "";
    header("Location: redirection.php");
    exit;
}

//Vérifie si l'utilisateur souhaite supprimer son compte
if (isset($_POST["supp"])){
    $sql = "DELETE FROM utilisateurs WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->execute([":id"=>$idUtilisateur]);
    session_unset();
    session_destroy();
    header("Location: redirection.php");
    exit;
}

//Vérifie si l'utilisateur est l'admin
$sql = "SELECT `login` FROM utilisateurs WHERE id = :id";
$req = $pdo->prepare($sql);
$req->execute([":id"=>$idUtilisateur]);
$utilisateur = $req->fetch(PDO::FETCH_ASSOC);
if($utilisateur["login"] == "admin"){
    $_SESSION["admin"] = true;
} else {
    $_SESSION["admin"] = false;
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

    <?php
    if($_SESSION["admin"]){
        echo "Bienvenue cher administrateur !";
    } else {
        echo "Bienvenue, " . htmlspecialchars($prenom) . " " . htmlspecialchars($nom) ." !"; 
    }
    ?><br><br>

    <form action="modif.php" method="post">
        <button type="submit">Modifier votre profil</button>
    </form>

    <form action="" method="post">
        <button type="submit" name="deco">Se déconnecter</button>
    </form>

    <form action="" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre profil ? Cette action est irréversible !');">
        <button type="submit" name="supp">Supprimer votre profil</button>
    </form>

    <?php
    if($_SESSION["admin"]){
        echo "<form action='' method='post'>
                <button type='submit' name='admin'>Admin</button>
              </form>";
    }
    ?>

</body>
</html>