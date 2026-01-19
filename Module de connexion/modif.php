<?php

session_start();
require "connexion.php";

if(!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

$idUtilisateur = $_SESSION["id"];
$id = $_SESSION["login"];
$prenom = $_SESSION["prenom"];
$nom = $_SESSION["nom"];

if(isset($_POST["identifiant"]) && isset($_POST["mdp"])) {

    $id_nouv = trim($_POST["identifiant"]);
    $prenom_nouv = trim($_POST["prenom"]);
    $nom_nouv = trim($_POST["nom"]);
    $mdp = trim($_POST["mdp"]);
    $mdp_nouv = trim($_POST["mdp_nouv"]);

    $sql = "SELECT passwrd FROM utilisateurs WHERE id = :id";
    $req = $pdo->prepare($sql);
    $req->execute([":id" => $idUtilisateur]);
    $utilisateur = $req->fetch(PDO::FETCH_ASSOC);

    if(!$utilisateur || !password_verify($mdp, $utilisateur['password'])) {
        $_SESSION["erreurMDP"] = "Mot de passe actuel incorrect !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    if(strlen($id_nouv) < 3) {
        $_SESSION["erreurID"] = "Pas assez de caractères dans votre identifiant !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    if(!empty($mdp_nouv)) {

        if(strlen($mdp_nouv) < 6) {
            $_SESSION["erreurMDP_NOUV"] = "Le nouveau mot de passe doit faire au moins 6 caractères";
            header("Location: ".$_SERVER["PHP_SELF"]);
            exit;
        }

        if(!preg_match('/\d/', $mdp_nouv)) {
            $_SESSION["erreurMDP_NOUV"] = "Le nouveau mot de passe doit contenir au moins un chiffre";
            header("Location: ".$_SERVER["PHP_SELF"]);
            exit;
        }
    }


    if(trim($id_nouv) == ""){
        $_SESSION["erreurVIDE"] = "Vous devez rentrer votre identifiant !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    $sqlCheck = "SELECT * FROM utilisateurs WHERE `login` = :identifiant AND id != :id";
    $reqCheck = $pdo->prepare($sqlCheck);
    $reqCheck->execute([":identifiant"=>$id_nouv, ":id"=>$idUtilisateur]);
    if($reqCheck->rowCount() > 0){
        $_SESSION["erreurID"] = "Identifiant déjà utilisé !";
        header("Location: ".$_SERVER["PHP_SELF"]);
        exit;
    }

    $params = [":identifiant" => $id_nouv, ":id" => $idUtilisateur];
    if(!empty($prenom_nouv)){
        $params[":prenom"] = $prenom_nouv;
    }

    if(!empty($nom_nouv)){
        $params[":nom"] = $nom_nouv;
    }
    
    if(!empty($mdp_nouv)){
        $mdpHash = password_hash($mdp_nouv, PASSWORD_DEFAULT);
        $params[":mdp"] = $mdpHash;
    }

    $sql = "UPDATE utilisateurs SET `login` = :identifiant";
    if(!empty($mdp_nouv)){
        $sql .= ", passwrd = :mdp";
    }
    if(!empty($prenom_nouv)){
        $sql .= ", prenom = :prenom";
    }
    if(!empty($nom_nouv)){
        $sql .= ", nom = :nom";
    }
    $sql .= " WHERE id = :id";

    $req = $pdo->prepare($sql);
    $req->execute($params);

    $_SESSION["login"] = $id;
    $_SESSION["prenom"] = $prenom;
    $_SESSION["nom"] = $nom;
    $_SESSION["valide"] = "Modifications réussies !";
    header("Location: redirection.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Modification</title>
</head>
<body>
    <h1>Modifier le profil</h1>
    <form action="" method="post">

        <label for="identifiant">Votre identifiant :</label>
        <input type="text" name="identifiant" value = "<?= htmlspecialchars($id) ?>" >
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
        <input type="text" name="prenom" value = "<?= htmlspecialchars($prenom) ?>" >
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

        <label for="nom">Votre nom :</label>
        <input type="text" name="nom" value = "<?= htmlspecialchars($nom) ?>" >
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
        <input type="password" name="mdp" placeholder="Mot de passe actuel">
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
        <label for="mdp_nouv">Votre nouveau mot de passe :</label>
        <input type="password" name="mdp_nouv" placeholder="Laissez vide pour ne pas changer">
        <?php
        if (isset($_SESSION["erreurMDP_NOUV"])) {
            echo $_SESSION["erreurMDP_NOUV"];
            unset($_SESSION["erreurMDP_NOUV"]);
        }
        if (isset($_SESSION["erreurVIDE"])) {
            echo $_SESSION["erreurVIDE"];
            unset($_SESSION["erreurVIDE"]);
        }
        ?><br>
        <button type="submit" name="envoyer">Modifier le profil</button> <br>
   </form>

   <button type="button" onclick="history.back()">Retour</button>

   
</body>
</html>