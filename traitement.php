<?php
// On se connecte à la bdd
require_once("./config/connexion.php");

// On déclare les variables name
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$plat = $_POST['plat'];

// On ajoute une entrée dans la table menus
$req = $bdd->prepare('INSERT INTO menus(nom, prix) VALUES(:nom, :prix)');
$req->execute(array(
	'nom' => $nom,
	'prix' => $prix
	));


// On récupère l'id du menu qui vient d'être créée
$req_id_menus = $bdd->lastInsertId();

//test
// var_dump($bdd);
// var_dump($req);
// var_dump($req_id_menus);

$plat = intval($plat);
$req = $bdd->prepare('INSERT INTO relation_menus_plats (id_menus, id_plats) VALUES(:id_menus, :id_plats)');
$req->execute(array(
	'id_menus' => $req_id_menus,
	'id_plats' => $plat
	));
header('Location:resultatMenu.php');
?>
