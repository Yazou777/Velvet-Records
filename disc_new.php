<?php

    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();

    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // var_dump($tableau);
    // on clôt la requête en BDD
    $requete->closeCursor();

?>


<!DOCTYPE html>
<html lang="fr"  class="px-5 py-5">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/RegEx.css" >
    <title> Ajouter un vinyle</title>
</head>
<body>


    <form action ="script_disc_ajout.php" id="fajout" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this);">

<fieldset>
    
    <legend class="h1">Ajouter un vinyle</legend>

    <div class="form-group">
        <label for="titre">Titre :</label>
        <input type="text" name="titre" id="titre" class="form-control"  required >
        <small id="usernameHelp" class="form-text">Username must be between 5 - 12 characters.</small>
        
    </div>

    <div class="form-group">
                       <label for="artist">Nom de l'artiste :</label>
                       <select class="form-control"  id="artist" name="artist" required>
                       <option value=""  selected>Veuillez séléctionner un sujet</option>
                    <?php foreach ($tableau as $artist): ?>

        <?php /*var_dump($artist);*/ // Le var_dump() est écrit à titre informatif ?>

                        <option  value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                    <?php endforeach; ?>  
                       </select>
    </div>

    
    
        <div class="form-group">
        <label for="year">Année de sortie :</label>
        <input type="text" name="year" id="year" class="form-control" required >
        <small id="usernameHelp" class="form-text">Entrez une Année a 4 chiffres</small>
        </div>
        

        <div class="form-group">
        <label for="genre">Genre :</label>
        <input type="text" name="genre" id="genre" class="form-control" required>
        </div>
        

        <div class="form-group">
        <label for="label">Label :</label>
        <input type="text" name="label" id="label" class="form-control" required>
        </div>
        

        <div class="form-group">
        <label for="price">Prix :</label>
        <input type="text" name="price" id="price" class="form-control" required>
        <small id="usernameHelp" class="form-text">number and . only</small>
        </div>


        <div class="form-group">
        <label for="fichier">Jaquette :</label>
        <br>
        <input type="file" name="fichier" id="fichier" > 
        </div>

        
        </fieldset>
        
      
       
        

    </form>
    <input class="btn btn-primary btn-sm" form="fajout" type="submit" value="Ajouter">
        <a href="disc.php"><button class="btn btn-primary btn-sm">Retour</button></a>
        <input type="reset" value="reset" class="btn btn-primary btn-sm">
   


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/RegEx.js"></script>
</body>
</html>