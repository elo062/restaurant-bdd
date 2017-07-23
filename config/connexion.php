<?php

$servername = "localhost";
$username = "nico";
$password = "menu";

try {
    $bdd = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password, array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
