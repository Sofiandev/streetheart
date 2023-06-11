<?php
session_start();
require_once "./model/managers/UserManager.php";
require_once "./model/managers/CategoryManager.php";
$categories = CategoryManager::getAllCategories();

// //On vérifie si le formulaire a été envoyé 

// if (!empty($_POST)) {
//     //le formulaire a été envoyé
//     //On vérifie que TOUS les champs requis sont remplis

//     if (isset($_POST['mail'], $_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password'])) {
//         //onvérifie que l'email est un email
//         if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
//             die("ce n'est pas un email");
//         }
//     }
// }

//reception des données du formulaire


if (isset($_POST) && !empty($_POST)) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    if (empty($mail) || empty($password)) {
        // Afficher un message d'erreur dans une alerte Bootstrap
        $alertMessage = "Tous les champs doivent être remplis";
        $alertType = "danger";
    } else {
        // Récupération des données de l'utilisateur via une valeur unique telle que le mail
        $user = UserManager::getUserBymail($mail);
        // Vérification de la correspondance du mot de passe en base de données avec celui saisi par l'utilisateur
        $verified_user = password_verify($password, $user->getPassword());
        if ($verified_user) {
            UserManager::connectUser($user);
            // Afficher un message de succès dans une alerte Bootstrap
            $alertMessage = "Vous êtes bien connecté";
            $alertType = "success";
            // Rediriger vers la page d'accueil ou une autre page appropriée
            header('location:index.php');
            exit;
        } else {
            // Afficher un message d'erreur dans une alerte Bootstrap
            $alertMessage = "Email ou mot de passe incorrect";
            $alertType = "danger";
        }
    }
}

require_once './views/loginView.php';
