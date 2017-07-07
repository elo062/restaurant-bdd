<!-- Page qui affiche tous les plats -->
<?php
// On se connecte à la bdd
include("./config/connexion.php");

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

$plat = intval($plat);
$req = $bdd->prepare('INSERT INTO relation_menus_plats (id_menus, id_plats) VALUES(:id_menus, :id_plats)');
$req->execute(array(
	'id_menus' => $req_id_menus,
	'id_plats' => $plat
	));

?>

<h1>Vos menus créés :</h1>

<?php
// On récupère tout le contenu de la table plat
$reponse = $bdd->query('SELECT * FROM menus');

// On parcourt la table plat de la bdd pour afficher le résultat :
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Menu ajouté</strong> : <?php echo $donnees['nom']; ?><br />
    Prix : <?php echo $donnees['prix']; ?>
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête
// tables

$req_menu_plat = $bdd->query('SELECT menus.prix AS menuPrix,
																			menus.nom AS menuNom,
																			plats.prix AS platsPrix,
																			plats.nom AS platsNom
															FROM `relation_menus_plats`
															LEFT JOIN menus ON `menus`.id = `relation_menus_plats`.id_menus
															LEFT JOIN plats ON `plats`.id = `relation_menus_plats`.id_plats');



while ($donnees = $req_menu_plat->fetch())
{
  // var_dump($donnees);
?>
    <p>
    <strong>Menu ajouté</strong> : <?php echo $donnees['menuNom']; ?><br />
    Plat : <?php echo $donnees['platsNom']; ?>
   </p>
<?php
}

?>
