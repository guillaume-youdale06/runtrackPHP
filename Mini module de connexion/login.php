<?php

session_start();
require "connexion.php";

if(isset($_SESSION["id"])){
    $_SESSION["erreur"] = "Vous êtes déjà connecter !";
    header("Location: redirection.php");
    exit;
}

if (isset($_POST["inscrire"])){
    header("Location: inscription.php");
    exit;
}

if (isset($_POST["identifiant"]) && isset($_POST["mdp"])){

    $nom = $_POST["identifiant"];
    $mdp = $_POST["mdp"];

    if(trim($nom) == "" || trim($mdp) == "") {
        $_SESSION["erreurVIDE"] = "L'identifiant et/ou le mot de passe ne peuvent pas être vide !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }


    $sqlCheck = "SELECT id, password FROM utilisateurs WHERE username = :nom";
    $reqCheck = $pdo->prepare($sqlCheck);
    $reqCheck->execute([":nom"=>$nom]);
    $utilisateur = $reqCheck->fetch(PDO::FETCH_ASSOC);
    if($utilisateur && password_verify($mdp, $utilisateur['password'])){ 
        $_SESSION["id"] = $utilisateur['id'];
        $_SESSION["username"] = $nom;
        $_SESSION["valide"] = "Connexion réussie ! Redirection en cours...";
        header("Location: redirection.php");
        exit;
    } else {
        $_SESSION["erreur"] = "Identifiant ou mot de passe incorrect !";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="" method="post">
        <label for="identifiant">Votre identifiant :</label>
        <input type="text" name="identifiant" placeholder="Votre identifiant..." value = "<?= isset($nom) ? htmlspecialchars($nom) : '' ?>">
        <?php
        if (isset($_SESSION["erreur"])) {
            echo $_SESSION["erreur"];
            unset($_SESSION["erreur"]);
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
        if (isset($_SESSION["erreurVIDE"])) {
            echo $_SESSION["erreurVIDE"];
            unset($_SESSION["erreurVIDE"]);
        }
        ?><br>
        <button type="submit" name="envoyer">Se connecter</button>
        <button type="submit" name="inscrire">Créer un compte</button>
   </form>
    
</body>
</html>