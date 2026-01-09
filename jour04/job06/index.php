<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job06</title>
</head>
<body>
    <form action="" method="get">
        <label for="nom">Entrez un nombre : </label>
        <input type="number" name="nombre" placeholder="un nombre">
        <input type="submit" value="Envoyer">
    </form>

    <?php
        if (!empty($_GET)) {
            if ($_GET["nombre"] % 2 == 0) {
                echo "Nombre pair";
            } else {
                echo "Nombre impair";
            }
        }
    ?>
    
</body>
</html>