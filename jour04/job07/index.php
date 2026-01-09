<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job06</title>
</head>
<body>
    <form action="" method="get">
        <label for="largeur">Entrez la largeur : </label>
        <input type="number" name="largeur" placeholder="un nombre...">
        <label for="hauteur">Entrez la hauteur : </label>
        <input type="number" name="hauteur" placeholder="un nombre...">
        <input type="submit" value="Envoyer">
    </form>

    <?php
        
        if (!empty($_GET)) {
            echo "<pre>";
            $compteurlarg = $_GET["largeur"];
            $compteurhaut = $_GET["hauteur"];

            for($i = $compteurhaut; $i > 0; $i--){
                for($y = $compteurhaut; $y > 1; $y--){
                    echo " ";
                }
                echo "/";
                for($y = $_GET["largeur"]; $y > $compteurlarg; $y--){
                    echo "__";
                }
                echo "\<br>";
                $compteurhaut--;
                $compteurlarg--;
            }
            
            $compteurhaut = $_GET["hauteur"];

            for ($i = $compteurhaut; $i > 0; $i--){
                echo "|";
                for($y = 2*$compteurhaut; $y > 2; $y--) {
                    if ($i == 1) {
                        echo "_";
                    } else {
                        echo " ";
                    }
                }
                echo "|<br>";
            }
            echo "</pre>";
        }
    ?>
    
</body>
</html>