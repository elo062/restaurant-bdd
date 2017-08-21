<?php
include("header.php");
require_once("./config/connexion.php");

// On définit la variable idPlat en récupérant le ? idPlat = de la boucle foreach résultatPlat.php
$idPlat = $_GET['idPlat'];

// On entre dans le champ de la bdd pour le supprimer :
$requete = $bdd->prepare('DELETE FROM `plats` WHERE id = :ID');
$requete->bindParam(':ID', $idPlat);
$requete->execute();

include("footer.php");
 ?>
