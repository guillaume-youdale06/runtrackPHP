<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job04</title>
</head>
<body>
    <form action="" method="post">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" placeholder="nom">
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp">
        <input type="submit" value="Envoyer">
    </form>

        <?php
            if (!empty($_POST)) {
                echo "<table border=1>
                      <tr><th>arguments POST</th>
                      <th>Valeurs POST</th>
                      </tr>";

                foreach ($_POST as $key => $value) {
                    echo "<tr><td>".$key."</td>";
                    echo "<td>".$value."</td></tr>";
                }
                echo "</table>";
            }
            
        ?>
    
</body>
</html>