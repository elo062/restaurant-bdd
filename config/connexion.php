<?php
// Connexion à la base de données
$serverName = 'localhost';
$dbname = 'restaurant';
$login = 'nico';
$mdp = 'menu';


try
{
    $bdd = new PDO("mysql:host=$serverName;dbname=$dbname;charset=utf8", $login, $mdp);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>
