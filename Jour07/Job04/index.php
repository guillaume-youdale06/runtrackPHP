<?php

session_start();

if (!isset($_POST["connexion"])) {
   echo "<form action='' method='post'>
         <input type='text' name='prenom' placeholder='Votre prénom...'>
         <button type = 'submit' name = 'connexion'>Valider</button>
         </form>";
}

if (isset($_POST["connexion"])){
   setcookie("prenom", $_POST["prenom"], time() + 3600);
   echo "Bonjour ".$_POST["prenom"]." !";
   echo "<form action='' method='post'><button type = 'submit' name = 'deco'>Déconnexion</button></form>";
}

if (isset($_POST["deco"])){
   session_unset();
   header("Location: ". $_SERVER["PHP_SELF"]);
   exit;
}

?>