<?php
    // Récupération du Nom :

    
    
    if (isset($_POST['mdp']) && $_POST['mdp'] != "" ) {
        $mdp = $_POST['mdp'];
    }
    else {
        $mdp = Null;
    }
var_dump($_POST['mdp']);
    // Récupération de l'URL (même traitement, avec une syntaxe abrégée)
    $email = (isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : Null;
    var_dump($email);
   
    // En cas d'erreur, on renvoie vers le formulaire
    if ($mdp == Null) {
        header("Location: login_form.php");
        exit;
    }







    // S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
    require "db_compte.php"; 
    $db = connexionBase();

     // on lance une requête pour chercher toutes les fiches d'artistes
     $requete = $db->query("SELECT * FROM auth Where email like '$email'" );
     // on récupère tous les résultats trouvés dans une variable
     $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
     // var_dump($tableau);
     // on clôt la requête en BDD
     $requete->closeCursor();
 
    var_dump($mdp);
     foreach ($tableau as $auth) {
     var_dump($auth);
     var_dump($auth->mdp);
     
     $verifymdp = password_verify($mdp, $auth->mdp);
    var_dump($verifymdp);
     }
    if ($verifymdp !=  true)
    {
        header("Location: login_form.php");
        exit;
    }










     
