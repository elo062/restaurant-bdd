<?php
// On se connecte à la bdd
require_once("./config/connexion.php");
require_once ("header.php");
?>
<!-- formulaire permettant d'ajouter un menu -->
<div class="plat">
  <form method="post" action="traitementMenu.php" enctype="multipart/form-data">
   <p>
     <label for="nom">Entrez le nom de votre menu :</label>
        <input type="text" name="nom" id="nom" placeholder="Ex : menu dégustation" size="30" maxlength="30" value="" />
       <br />
       <label for="prix">Entrez son prix en euros :</label>
       <input type="text" name="prix" id="prix" placeholder="Ex : 14.99" size="30" maxlength="5" value=""/><br />
       <label for="image">Ajoutez une photo (max 1Mo) :</label>
       <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
       <input type="file" name="image" value="image" id="image" />
    </p>
    <?php
    $reponse = $bdd->query('SELECT * FROM plats');
    // On parcourt la table plat de la bdd pour afficher les plats :
    echo '<p>Veuillez indiquer le plat que vous souhaitez :<br />';
    while ($donnees = $reponse->fetch())
    {
      echo'<input type="checkbox" name="plat[]" value="' . $donnees['ID'] . '"/>' . $donnees['nom'] .'<br />';
    }

    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>

    <input type="submit" name="envoyer" value="Envoyer" class="button">
  </form>
</div>
<?php require_once ("footer.php"); ?>
