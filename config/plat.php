<!-- formulaire permettant d'ajouter un menu -->
<form method="post" action="menu.php">
    <p>
        <label for="pseudo">Choisissez un menu :</label>
        <input type="text" name="ajoutMenu" id="ajoutMenu" placeholder="Ex : Pizza aux 4 fromages" size="30" maxlength="10" />
    </p>
</form>


<!-- formulaire permettant de choisir un plat -->
<form method="post" action="plat.php">
   <p>
       Cochez les plats souhaités :<br />
       <input type="checkbox" name="frites" id="frites" /> <label for="frites">Frites</label><br />
       <input type="checkbox" name="steak" id="steak" /> <label for="steak">Steak haché</label><br />
       <input type="checkbox" name="epinards" id="epinards" /> <label for="epinards">Epinards</label><br />
       <input type="checkbox" name="huitres" id="huitres" /> <label for="huitres">Huitres</label>
   </p>
</form>
