<?php
// Connexion à la base de données
// $serverName = 'localhost';
// $dbname = 'restaurant';
// $login = 'nico';
// $mdp = 'menu';
//
//
// try
// {
//     $bdd = new PDO("mysql:host=$serverName;dbname=$dbname;charset=utf8", $login, $mdp);
//     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// }
// catch(Exception $e)
// {
//         die('Erreur : '.$e->getMessage());
// }

$servername = "localhost";
$username = "nico";
$password = "menu";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password, array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    // set the PDO error mode to exception
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
