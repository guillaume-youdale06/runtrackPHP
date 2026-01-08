<?php

$str = "On n'est pas le meilleur quand on le croit mais quand on le sait";

$dic = [
    "consonnes" => ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "z"],
    "voyelles" => ["a", "A", "e", "E", "i", "I", "o", "O", "u", "U", "y", "Y"]
];

$compteurconsonnes = 0;
$compteurvoyelles = 0;


for ($i = 0; isset($str[$i]); $i++) {
    for ($y = 0; isset($dic["consonnes"][$y]); $y++) {
        if ($str[$i] == $dic["consonnes"][$y]) {
            $compteurconsonnes += 1;
            break;
        }
    }

    for ($y = 0; isset($dic["voyelles"][$y]); $y++) {
        if ($str[$i] == $dic["voyelles"][$y]) {
            $compteurvoyelles += 1;
            break;
        }
    }
}
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

        <tr>
            <th>Voyelles</th>
            <th>Consonnes</th>
        </tr>

        <tr>
            <td><?php echo $compteurvoyelles; ?></td>
            <td><?php echo $compteurconsonnes; ?></td>
        </tr>
    </table>
</body>
</html>