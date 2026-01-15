<?php

try {
   $pdo = new PDO("mysql:host=localhost;dbname=Jour08;charset=utf8", "root", "");

   $sql =   "SELECT salles.nom as salleNom, etage.nom
            FROM salles
            INNER JOIN etage
            ON salles.id_etage = etage.id";

   $req = $pdo -> prepare($sql);
   $req -> setFetchMode(PDO::FETCH_ASSOC);
   $req -> execute();

} catch(PDOException $e) {
   $pdo -> rollBack();
   echo "Erreur : " . $e->getMessage();
}

$tab = $req -> fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Job05</title>
</head>
<body>
   <table border=1>

      <?php

         echo "<thead><tr>";
         foreach(array_keys($tab[0]) as $colName) {
            echo "<th>".$colName."</th>";
         }
         echo "</tr><thead>";

         foreach($tab as $lst) {
            echo "<tr>";
            foreach($lst as $val) {
               echo "<td>".$val."</td>";
            }
            echo "</tr>";
         }

      ?>

   </table>  
</body>
</html>