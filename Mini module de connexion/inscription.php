<?php

session_start();
require "connexion.php";

if(isset($_POST["connexion"])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST["identifiant"]) && isset($_POST["mdp"])) {

    $id = $_POST["identifiant"];

    if(strlen($id) < 3) {
        $_SESSION["erreurID"] = "Pas assez de caractères dans votre identifiant !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    $mdp = $_POST["mdp"];

    if(strlen($mdp) < 6) {
        $_SESSION["erreurMDP"] = "Pas assez de caractères dans votre mot de passe !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    if(!preg_match('/\d/', $mdp)) {
        $_SESSION["erreurMDP"] = "Il vous faut au moins 1 chiffre dans votre mot de passe !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    if(trim($mdp) == "" || trim($id) == ""){
        $_SESSION["erreurVIDE"] = "Votre identifiant et/ou votre mot de passe ne peuvent pas être vide !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    $sqlCheck = "SELECT * FROM utilisateurs WHERE username = :identifiant";
    $reqCheck = $pdo->prepare($sqlCheck);
    $reqCheck->execute([":identifiant"=>$id]);
    if($reqCheck->rowCount() > 0){
        $_SESSION["erreurID"] = "Identifiant déjà utilisé !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (username, `password`) VALUES (:identifiant, :mdp)";

    $req = $pdo -> prepare($sql);
    $req -> execute([":identifiant"=>$id, ":mdp"=>$mdpHash]);

    $idUtilisateur = $pdo->lastInsertId();

    $_SESSION["id"] = $idUtilisateur;
    $_SESSION["username"] = $id;

    $_SESSION["valide"] = "Inscription réussie !";
    header("Location: redirection.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="" method="post">
        <label for="identifiant">Votre identifiant :</label>
        <input type="text" name="identifiant" placeholder="Votre identifiant...">
        <?php
        if (isset($_SESSION["erreurID"])) {
            echo $_SESSION["erreurID"];
            unset($_SESSION["erreurID"]);
        }
        if (isset($_SESSION["erreurVIDE"])) {
            echo $_SESSION["erreurVIDE"];
            unset($_SESSION["erreurVIDE"]);
        }
        ?>
        <br>
        <label for="mdp">Votre mot de passe :</label>
        <input type="password" name="mdp" placeholder="Votre mot de passe...">
        <?php
        if (isset($_SESSION["erreurMDP"])) {
            echo $_SESSION["erreurMDP"];
            unset($_SESSION["erreurMDP"]);
        }
        if (isset($_SESSION["erreurVIDE"])) {
            echo $_SESSION["erreurVIDE"];
            unset($_SESSION["erreurVIDE"]);
        }
        ?><br>
        <button type="submit" name="envoyer">S'inscrire</button>
        <button type="submit" name="connexion">Connexion</button>
   </form>
   
</body>
</html>