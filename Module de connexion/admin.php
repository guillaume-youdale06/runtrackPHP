<?php

session_start();
require "connexion.php";

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

$idUtilisateur = $_SESSION["id"];

$sql = "SELECT * FROM utilisateurs WHERE id = :id";
$req = $pdo->prepare($sql);
$req->execute([":id"=>$idUtilisateur]);
$utilisateur = $req->fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM utilisateurs";
$req = $pdo->prepare($sql);
$req->execute();
$utilisateurs = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>
    <?php
if ($utilisateur["login"] === "admin") {
    echo "<table border='1'>";

    echo "<thead>
            <tr>
                <th>Identifiant</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Mot de passe</th>
            </tr>
          </thead>";

    echo "<tbody>";
    foreach ($utilisateurs as $user) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($user["login"]) . "</td>";
        echo "<td>" . htmlspecialchars($user["prenom"]) . "</td>";
        echo "<td>" . htmlspecialchars($user["nom"]) . "</td>";
        echo "<td>" . htmlspecialchars($user["passwrd"]) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";

    echo "</table>";
}
?>

<button type="button" onclick="history.back()">Retour</button>

    
</body>
</html>