<?php

require_once "./model/managers/UserManager.php";
require_once "./model/managers/CategoryManager.php";
$categories = CategoryManager::getAllCategories();

//On vérifie que le formulaire à bien été envoyé
if (isset($_POST) && !empty($_POST)) {
    // var_dump($_POST);
    //le forumalaire a été envoyé
    //on vérifie que TOUS les champs requis sont remplis
    //dans le post['attributnamedansform']
    if (
        isset($_POST["name"], $_POST['pseudo'], $_POST['age'], $_POST['mail'], $_POST['password'])
        && !empty($_POST["name"])
        && !empty($_POST["pseudo"])
        && !empty($_POST["age"])
        && !empty($_POST["mail"])
        && !empty($_POST["password"])
    ) {
        //vérifier si l'email est vraiment un email soit regex soit fonction filter_var
        if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            die("l'adresse email est incorrecte");
        } 
        // le formulaire est complet
        //On récupère les données en les protégeant (éviter faille xss)
        //soit htmlspecialchars, soit htmlentities, soit strip_tags(supprime balises)
        $name = htmlentities($_POST["name"]);
        $pseudo = htmlentities($_POST["pseudo"]);
        $age = htmlentities($_POST["age"]);
        $mail = htmlentities($_POST['mail']);
        
        //on va hasher le mot de passe
        $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
        // die($pass); voir le mot de passe hasher

        //Ajouter ici tous les controles souhaités (email unique par exemple)

        //on enregistre en base de données
        //transmission à une méthode du manager pour enregistrer en bdd
        UserManager::addUser($name, $pseudo, $age, $mail, $pass);
        header("Location: index.php");
exit();
    } else {
        //on gérera la gestion du formulaire avec le fait de garder les données plus tard
        die("le formulaire est incomplet");
    }
}

require_once './views/signupView.php';
