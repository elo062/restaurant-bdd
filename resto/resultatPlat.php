<!-- Page qui affiche tous les plats -->
<?php
// On se connecte à la bdd
include("./config/connexion.php");

// On déclare les variables name
$nom = $_POST['nom'];
$prix = $_POST['prix'];
$image = $_FILES['image']['name'];
$maxsize = 12345;
$maxwidth = 1000;
$maxheight = 1000;
//print_r($_FILES);

     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
// $_FILES['image']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
// $_FILES['image']['size'];     //La taille du fichier en octets.
// $_FILES['image']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
// $_FILES['image']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.


// Contrôles sur le fichier :
if ($_FILES['image']['error'] > 0) $erreur = "Erreur lors du transfert";
if ($_FILES['image']['size'] > $maxsize) $erreur = "Le fichier est trop gros";

// On récupère les photos envoyées :
$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
//1. strrchr renvoie l'extension avec le point (« . »).
//2. substr(chaine,1) ignore le premier caractère de chaine.
//3. strtolower met l'extension en minuscules.
$extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";

$image_sizes = getimagesize($_FILES['image']['tmp_name']);
if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";

// //Créer un dossier 'images'
if(!file_exists("images")){
	mkdir('images', 0777, true);
}
//
// //Créer un identifiant difficile à deviner
//   $nom = md5(uniqid(rand(), true));
//
//   $nom = "avatars/{$id_membre}.{$extension_upload}";
 $resultat = move_uploaded_file($_FILES['image']['tmp_name'], "images/".$image);
 if ($resultat) echo "Transfert réussi";

// Note : la variable exec s'utilise uniquement avec des infos en dur, il vaut mieux utiliser le code suivant :

// On ajoute une entrée dans la table plat
$req = $bdd->prepare('INSERT INTO plats(nom, prix, image) VALUES(:nom, :prix, :image)');
$req->execute(array(
	'nom' => $nom,
	'prix' => $prix,
	'image' => "images/".$image,
	));
?>

<h1>Vos plats du moment</h1>

<?php
// On récupère tout le contenu de la table plat
$reponse = $bdd->query('SELECT * FROM plats');

// On parcourt la table plat de la bdd pour afficher le résultat :
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Plat ajouté</strong> : <?php echo $donnees['nom']; ?><br />
    Prix : <?php echo $donnees['prix']; ?><br />
    <img src="<?php echo $donnees['image']; ?>" alt="image plat" />
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
