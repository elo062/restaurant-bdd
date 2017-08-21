<!-- Page qui affiche tous les plats -->
<?php
// On se connecte à la bdd
include("./config/connexion.php");
include("header.php");
$reponse = $bdd->query('SELECT * FROM plats');
$plats = $reponse;
 ?>

 <div class="texte">
 <h1>Vos plats du moment :</h1>
	</div>


 <?php
 foreach($plats as $plat)
 {
         // var_dump($menu);
 				echo "<p class='plat'>id : " . $plat['ID'] . " </p>";
 				echo "<p class='plat'>Plat : " . $plat['nom'] . " </p>";
 				echo "<p class='plat'>Prix : " . $plat['prix'] . " € </p><br />";
				echo "<p class='plat'><Image : " . $plat['image'] . " </p><br />";
				echo "<p class='plat'><img src='./assets/img/" . $plat['image'] . "' </p><br />";
        echo "<a href='updatePlat.php'><input type='submit' value='Modifier' class='button' name='idPlat'></a>";
 				echo "<a href='supprimerPlat.php?idPlat=" . $plat['ID'] . "'><input type='submit' value='Supprimer' class='button' name='idPlat'></a>";
 }

include("footer.php");
?>
