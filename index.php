<?php
session_start();
require_once "model/managers/PostManager.php";
require_once "model/managers/UserManager.php";
require_once "model/managers/CategoryManager.php";

$categories = CategoryManager::getAllCategories();



//le but de la page d'accueil étant d'accueillir tous les articles, on récupère tous les articles
$posts = PostManager::getAllPosts();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    //on le met dans une variable pour plus de simplicité par la suite
    //on nettoie l'id envoyé
    $id = htmlspecialchars($_GET['id']);
    //on va chercher les informations de l'article qu'on souhaite afficher
    $user = UserManager::getUserByPostId($id);   //les infos de l'article
    $categories = CategoryManager::getCategoriesByPostId($id);
    foreach ($posts as $post) {
        $post->setCategories(CategoryManager::getCategoriesByPostId($post->getId()));
    }
} // }else{
//     $_SESSION['erreur'] = 'URL invalide';
//     header('Location: index.php');
//     exit();       //ajoutez cette ligne pour empêcher l'exécution de tout code ultérieur

// }


require_once './views/indexView.php';
