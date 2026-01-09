<?php
ini_set("display_errors", 1);
    if(empty($_GET)){
        echo "Le nombre d'arguments de GET s'élève à : 0";
    } else {
        echo "Le nombre d'arguments de GET s'élève à : ".count($_GET);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job01</title>
</head>
<body>
    <form action="" method="get">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" placeholder="nom">
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp">
        <input type="submit" value="Envoyer">
    </form>
    
</body>
</html>