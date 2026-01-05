<?php

#Différentes variables
$bool = true;
$entier = 8;
$chaine = "Hello LaPlateforme !";
$virgule = 8.9;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau</title>
</head>
<body>

<!-- Création du tableau avec les valeurs -->
 
<table border="1">

    <tr>
        <th>type</th>
        <th>nom</th>
        <th>valeur</th>
    </tr>

    <tr>
        <td><?php echo gettype($bool);?></td>
        <td><?php echo 'bool';?></td>
        <td>
            <?php if ($bool == 1) {
                echo "true";
            }
            else {
                echo "false";
            }
            ?>
        </td>
    </tr>

    <tr>
        <td><?php echo gettype($entier); ?></td>
        <td><?php echo 'entier'; ?></td>
        <td><?php echo $entier; ?></td>
    </tr>

    <tr>
        <td><?php echo gettype($chaine); ?></td>
        <td><?php echo 'chaine'; ?></td>
        <td><?php echo $chaine; ?></td>
    </tr>

    <tr>
        <td><?php echo gettype($virgule); ?></td>
        <td><?php echo 'virgule'; ?></td>
        <td><?php echo $virgule; ?></td>
    </tr>

</table>
</body>
</html>