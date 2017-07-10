<!-- Page qui affiche tous les Menus -->
<?php
include("header.php");
?>

<h1>Vos menus créés :</h1>

<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
// On récupère tout le contenu de la table
$reponse = $bdd->query('SELECT * FROM menus');

// $reponse = $reponse->execute();
// On déclare un tableau menu pour l'utiliser dans une boucle foreach après :
// $rps = $reponse->fetch(PDO::FETCH_ASSOC);
$menus = $reponse;


// $array = array('menus'=>$menu);

// var_dump($menus);

// On parcourt le tableau avec la boucle foreach pour afficher le résultat :
foreach($menus as $menu)
{
        // var_dump($menu);
				echo "<p class=''><strong>id </strong> :" . $menu['ID'] . " </p>";
				echo "<p ><strong>Menu </strong> :" . $menu['nom'] . " </p>";
				echo "<p><strong>Prix </strong> :" . $menu['prix'] . " </p><br />";

}


// $reponse->closeCursor(); // Termine le traitement de la requête
// tables

// $req_menu_plat = $bdd->query('SELECT menus.prix AS menuPrix,
// 																			menus.nom AS menuNom,
// 																			plats.prix AS platsPrix,
// 																			plats.nom AS platsNom
// 															FROM `relation_menus_plats`
// 															LEFT JOIN menus ON `menus`.id = `relation_menus_plats`.id_menus
// 															LEFT JOIN plats ON `plats`.id = `relation_menus_plats`.id_plats');



// while ($donnees = $req_menu_plat->fetch())
// {
  // var_dump($donnees);
?>

<?php
include("footer.php");
?>
