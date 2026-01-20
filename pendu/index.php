<?php

session_start();

if(isset($_POST["reset"])){
   session_unset();
   session_destroy();
   header("Location: " . $_SERVER["PHP_SELF"]);
   exit;
}

if(isset($_POST["motValide"])){
   $_SESSION["motValide"] = $_POST["motValide"];
   header("Location: " . $_SERVER["PHP_SELF"]);
   exit;
}

if(isset($_POST["motUser"])){
   $_SESSION["motUser"] = $_POST["motUser"];
   header("Location: " . $_SERVER["PHP_SELF"]);
   exit;
}

if(isset($_SESSION["motUser"]) && isset($_SESSION["motValide"])){

   $motValide = $_SESSION["motValide"];
   $motUser = $_SESSION["motUser"];
   
   $motValideLong = strlen($motValide);
   $motUserLong = strlen($motUser);

   $affiche = "";

   if($motUserLong == 1){

      for($i=0; $i < $motValideLong; $i++){
         if (isset($_SESSION["lettre_$i"])){
            $affiche .= $_SESSION["lettre_$i"] . " ";
         }
         elseif($motValide[$i] == $motUser) {
            $affiche .= $motUser . " ";
            $_SESSION["lettre_$i"] = $motUser;

         } else {
            $affiche .= "_ ";
         }
      }
   }

   if($motUserLong == $motValideLong){

      for($i=0; $i < $motValideLong; $i++){
         if (isset($_SESSION["lettre_$i"])){
            $affiche .= $_SESSION["lettre_$i"] . " ";
         }
         elseif($motValide[$i] == $motUser[$i]){
            $affiche .= $motValide[$i] . " ";
            $_SESSION["lettre_$i"] = $motValide[$i];
         } else {
            $affiche .= "_ ";
         }
      }
   }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>pendu</title>
</head>
<body>
   <?php
   if(isset($_SESSION["motValide"]) && !isset($_SESSION["motUser"])){
      echo  "<form action='' method='post'>
            <input type='text' name='motUser' placeholder='A vous de jouer !'>
            <button type='submit'>Valider</button>
            </form>";
   }

   if(!isset($_SESSION["motValide"])) {
      echo "<form action='' method='post'>
            <input type='text' name='motValide' placeholder='Votre mot...'>
            <button type='submit'>Valider</button>
            </form>";
   }

   if(isset($_SESSION["motValide"]) && isset($_SESSION["motUser"])) {
      echo $affiche;
      echo "<form action='' method='post'>
            <input type='text' name='motUser' placeholder='A vous de jouer !'>
            <button type='submit'>Valider</button>
            </form>";
   }
   ?>
   <br>

   <form action="" method="post">
      <button type="submit" name="reset">Reset</button>
   </form>
   
</body>
</html>