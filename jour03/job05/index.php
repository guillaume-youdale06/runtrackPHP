<?php

$str = "On n'est pas le meilleur quand on le croit mais quand on le sait";

$dic = [
    "consonnes" => ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", "r", "s", "t", "v", "w", "x", "z"],
    "voyelles" => ["a", "e", "i", "o", "O", "u", "y"]
];

$test = "";
$compteurconsonnes = 0;
$compteurvoyelles = 0;


for ($i = 0; $test != $str; $i++) {
    for ($y = 0; $y < 20; $y++) {
        if ($str[$i] == $dic["consonnes"][$y]) {
            $compteurconsonnes += 1;
            break;
        }
    }
    for ($y = 0; $y < 6; $y++) {
        if ($str[$i] == $dic["voyelles"][$y]) {
            $compteurvoyelles += 1;
            break;
        }
    }
    $test .= $str[$i];
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