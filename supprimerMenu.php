<?php
include("header.php");
require_once("./config/connexion.php");

// On définit la variable idMenu en récupérant le ? idMenu = de la boucle foreach résultatMenu.php
$idMenu = $_GET['idMenu'];

// On entre dans le champ de la bdd pour le supprimer :
$requete = $bdd->prepare('DELETE FROM `menus` WHERE id = :ID');
$requete->bindParam(':ID', $idMenu);
$requete->execute();


// On définit la variable idPlat en récupérant le ? idPlat = de la boucle foreach résultatPlat.php
$idPlat = $_GET['idPlat'];

// On entre dans le champ de la bdd pour le supprimer :
$requete = $bdd->prepare('DELETE FROM `relation_menus_plats` WHERE id = :id_menus');
$requete->bindParam(':id_menus', $idPlat);
$requete->execute();

include("footer.php");
 ?>
