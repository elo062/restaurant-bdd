<!-- Page qui affiche tous les plats -->
<?php
// On se connecte à la bdd
include("./config/connexion.php");

// On déclare les variables name
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$plat = $_POST['plat'];

// On ajoute une entrée dans la table plat
$req = $bdd->prepare('INSERT INTO menus(nom, prix, id_plat) VALUES(:nom, :prix, :plat)');
$req->execute(array(
	'nom' => $nom,
	'prix' => $prix,
  'plat' => $plat
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



$req_menu_plat = $bdd->query('SELECT menus.prix AS menuPrix, menus.nom AS menuNom, plats.prix AS platsPrix, plats.nom AS platsNom
FROM `plats`
INNER JOIN `menus`
ON `plats`.`ID` = `menus`.`id_plat`
');

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
