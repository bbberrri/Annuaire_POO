<form method="post" action="index.php?uc=gerer&action=ajouterModif">
    <label for="id">ID</label><br>
    <input type="number" name="id" value="<?php echo $id; ?>" readonly><br>
    
    <label for="nom">Nom</label><br>
    <input type="text" name="nom"><br>
    
    <label for="prenom">Prénom</label><br>
    <input type="text" name="prenom"><br>
    
    <button type="submit" class="btn btn-primary">Valider</button>
</form>