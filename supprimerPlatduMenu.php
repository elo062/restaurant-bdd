<?php
include("header.php");
require_once("./config/connexion.php");

$idMenu = $_GET['idMenu'];
$idPlat = $_GET['idPlat'];


// On supprime d'abord la relation entre les plats et le menu
// On entre dans le champ "id_menus" de la table "relation_menus_plats" pour supprimer l'ID du menu :
$requete = $bdd->prepare('DELETE FROM `relation_menus_plats` WHERE id_menus = :id_menus AND id_plats= :id_plats');
$requete->bindParam(':id_menus', $idMenu);
$requete->bindParam(':id_plats', $idPlat);
$requete->execute();

echo  "<p class='plat'>Votre plat a bien été supprimé du menu !</p>";

// // On définit la variable idPlat en récupérant le "?idPlat=" de la boucle foreach resultatPlat.php
// $idPlat = $_GET['idPlat'];
//
// // On entre dans le champ de la bdd pour le supprimer :
// $requete = $bdd->prepare('DELETE FROM `plats` WHERE id = :ID');
// $requete->bindParam(':ID', $idPlat);
// $requete->execute();

include("footer.php");
 ?>
