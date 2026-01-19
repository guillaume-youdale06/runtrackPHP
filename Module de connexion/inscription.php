<?php

session_start();
require "connexion.php";

if(isset($_POST["connexion"])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST["identifiant"]) && isset($_POST["mdp"]) && isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["mdp_confirm"])) {

    $id = $_POST["identifiant"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $mdp = $_POST["mdp"];
    $mdp_confirm = $_POST["mdp_confirm"];

    if(strlen($id) < 3) {
        $_SESSION["erreurID"] = "Pas assez de caractères dans votre identifiant !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

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

    if(trim($mdp) == "" || trim($id) == "" || trim($mdp_confirm) == ""){
        $_SESSION["erreurVIDE"] = "Aucun des champs ne peut être vide !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    if ($mdp != $mdp_confirm) {
        $_SESSION["erreurMDP"] = "Les deux mots de passes rentrés ne sont pas identiques !";
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit;
    }

    $sqlCheck = "SELECT * FROM utilisateurs WHERE `login` = :identifiant";
    $reqCheck = $pdo->prepare($sqlCheck);
    $reqCheck->execute([":identifiant"=>$id]);
    if($reqCheck->rowCount() > 0){
        $_SESSION["erreurID"] = "Identifiant déjà utilisé !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

    $sql = "INSERT INTO utilisateurs (`login`, prenom, nom, passwrd) VALUES (:identifiant, :prenom, :nom, :mdp)";

    $req = $pdo -> prepare($sql);
    $req -> execute([":identifiant"=>$id, ":prenom"=>$prenom, ":nom"=>$nom, ":mdp"=>$mdpHash]);

    $idUtilisateur = $pdo->lastInsertId();

    $_SESSION["id"] = $idUtilisateur;
    $_SESSION["login"] = $id;
    $_SESSION["prenom"] = $prenom;
    $_SESSION["nom"] =$nom;

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
        
        <label for="prenom">Votre prenom :</label>
        <input type="text" name="prenom" placeholder="Votre prenom...">
        
        <?php
        if (isset($_SESSION["erreurVIDE"])) {
            echo $_SESSION["erreurVIDE"];
            unset($_SESSION["erreurVIDE"]);
        }
        ?>
        <br>
        
        <label for="nom">Votre nom :</label>
        <input type="text" name="nom" placeholder="Votre nom...">

        <?php
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
        ?>
        <br>

        <label for="mdp_confirm">Confirmation de votre mot de passe :</label>
        <input type="password" name="mdp_confirm" placeholder="Votre mot de passe...">
        
        <?php
        if (isset($_SESSION["erreurMDP"])) {
            echo $_SESSION["erreurMDP"];
            unset($_SESSION["erreurMDP"]);
        }
        if (isset($_SESSION["erreurVIDE"])) {
            echo $_SESSION["erreurVIDE"];
            unset($_SESSION["erreurVIDE"]);
        }
        ?>
        <br>
        
        <button type="submit" name="envoyer">S'inscrire</button><br><br>
        <label for="connexion">Déjà inscrit ?</label>
        <button type="submit" name="connexion">Se connecter</button>
   </form>
   
</body>
</html>