<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job04</title>
</head>
<body>
    <form action="" method="post">
        <label for="nom">Username :</label>
        <input type="text" name="username" placeholder="pseudo">
        <label for="password">Mot de passe :</label>
        <input type="text" name="mdp" placeholder="Votre mot de passe">
        <input type="submit" value="Envoyer">
    </form>

    <?php
        if (!empty($_POST)) {
            if ($_POST["username"] == "John" && $_POST["mdp"] == "Rambo") {
                echo "c'est pas ma guerre";
            } else {
                echo "votre pire cauchemar";
            }
        }
    ?>
    
</body>
</html>