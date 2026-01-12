<?php

function cesar($str, $nbr = 2){
    $tampon = "";
    $length = 0;

    while(isset($str[$length])){
        $length++;
    }

    for($i = $length - $nbr; isset($str[$i]); $i++){
        $tampon .= $str[$i];
    }

    for($i = 0; $i < $length - $nbr; $i++){
        $tampon .= $str[$i];
    }

    return $tampon;
}


function me($str) {
   $resultat = "";
   for($i=0; isset($str[$i]); $i++){
      if (isset($str[$i + 2])){
         if ($str[$i] == "m" && $str[$i+1] == "e" && $str[$i+2] == " ") {
            $resultat .= "me_";
            $i += 2;
            continue;
         }
      }
      $resultat .= $str[$i];
   }
   return $resultat;
}

function changeforme() {
   $resultat = "";
   if (isset($_GET["typo"])) {
      $typo = $_GET["typo"];
      $chaine = $_GET["str"];
      if ($typo == "gras") {
         for($i=0; isset($chaine[$i]); $i++){
            if ($chaine[$i] >= 'A' && $chaine[$i] <= 'Z'){
               $resultat .= "<strong>".$chaine[$i]."</strong>";
            } else {
               $resultat .= $chaine[$i];
            }
         }
         return $resultat;
      }

      else if ($typo == "césar"){
         $resultat = cesar($chaine);
         return $resultat;
      }

      else if ($typo == "plateforme"){
         $resultat = me($chaine);
         return $resultat;
      } else {
         return $_GET["str"];
      }
   }
}

if (isset($_GET["str"])){
   echo changeforme();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Job07</title>
</head>
<body>

   <form action="" method="get">
        <label for="str">Entrez un texte : </label>
        <input type="text" name="str" placeholder="un texte...">

        <select name="typo">
            <option value="">Choisir une option</option>
            <option value="gras">Gras</option>
            <option value="césar">César</option>
            <option value="plateforme">Plateforme</option>
         </select>

         <input type="submit" value="Envoyer">
   </form>

</body>
</html>