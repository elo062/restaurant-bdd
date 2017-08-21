<!-- Page qui affiche tous les Menus -->
<?php
include("header.php");
?>
<div class="texte">
<h1>Vos menus créés :</h1>
</div>

<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
// On récupère tout le contenu de la table menus
$reponse = $bdd->query('SELECT * FROM menus ORDER BY menus.id DESC');
$menus = $reponse;


// On parcourt le tableau avec la boucle foreach pour afficher le résultat :
foreach($menus as $menu)
{
				// echo "<p class='plat'>id : " . $menu['ID'] . " </p>";
				echo "<p class='plat'>Menu : " . $menu['nom'] . " </p>";
				echo "<p class='plat'>Prix : " . $menu['prix'] . '€' . " </p><br />";
				echo "<p class='plat'><img src='./assets/img/" . $menu['image'] . "' </p><br />";
				echo "<p class='plat'><a href='updateMenu.php'><input type='submit' value='Modifier' class='button' name='idMenu'></a>";
				echo "<a href='supprimerMenu.php?idMenu=" . $menu['ID'] . "'><input type='submit' value='Supprimer' class='button' name='idMenu'></a></p>";

				// On fait une jointure à gauche entre l'ID des plats de la table "plats" et l'id_menus de la table "relation_menus_plats"
				$platsMenu = $bdd->query('SELECT *  FROM `relation_menus_plats` LEFT JOIN plats ON `relation_menus_plats`.id_plats = plats.ID WHERE `id_menus` ="'.$menu['ID'] . '"');
				$plats = $platsMenu;
				// En-dessous de chaque menu on affiche les plats qui le composent avec toutes les infos
				foreach($plats as $plat)
				{
	 				echo "<p class='plat'>Plats composant le menu : " . $plat['nom'] . " </p>";
	 				echo "<p class='plat'>Prix : " . $plat['prix'] . " € </p><br />";
	        echo "<p class='plat'><a href='updatePlat.php'><input type='submit' value='Modifier' class='button' name='idPlat'></a>";
					// Lorsqu'on clique sur "supprimer" on récupère l'ID du plat et on est redirigé vers la page supprimerPlat.php pour le traitement
	 				echo "<a href='supprimerPlatduMenu.php?idPlat=" . $plat['ID'] . "&idMenu=" . $menu['ID'] . "'><input type='submit' value='Supprimer' class='button' name='idPlat'></a></p>";
				}

}

include("footer.php");
?>
