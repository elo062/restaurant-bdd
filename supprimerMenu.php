<?php
require_once("header.php");
require_once("./config/connexion.php");

// On définit la variable idMenu en récupérant le ? idMenu = de la boucle foreach résultatMenu.php
$idMenu = $_GET['idMenu'];

// On supprime d'abord la relation entre les plats et le menu
// On entre dans le champ "id_menus" de la table "relation_menus_plats" pour supprimer l'ID du menu :
$requete = $bdd->prepare('DELETE FROM `relation_menus_plats` WHERE id_menus = :id_menus');
$requete->bindParam(':id_menus', $idMenu);
$requete->execute();

// On supprime le menu en lui-même
// On entre dans le champ de la bdd pour supprimer l'ID du menu:
$requete = $bdd->prepare('DELETE FROM `menus` WHERE id = :ID');
$requete->bindParam(':ID', $idMenu);
$requete->execute();

echo  "<p class='plat'>Votre menu a bien été supprimé !</p>";

require_once("footer.php");
 ?>
