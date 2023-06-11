<?php
session_start();

require_once './model/managers/PostManager.php';
require_once './model/managers/UserManager.php';
require_once './model/managers/CategoryManager.php';
require_once './model/managers/CommentManager.php';



//cette page étant censée recevoir un id, on va d'abord vérifier qu'il est bien présent
if (isset($_GET['id']) && !empty($_GET['id'])) {
    //on le met dans une variable pour plus de simplicité par la suite
    //on nettoie l'id envoyé
    $id = htmlspecialchars($_GET['id']);
    //on va chercher les informations de l'article qu'on souhaite afficher
    $post = PostManager::getPostById($id);   //les infos de l'article
    if (!$post) {
        header("location:404.php");
    }
    $postCategories = CategoryManager::getCategoriesByPostId($id);
    $user = UserManager::getUserByPostId($id);
    $comments = CommentManager::getCommentsByIdPost($id);
} else {
    $_SESSION['erreur'] = 'URL invalide';
    header('Location: index.php');
    exit();       //ajoutez cette ligne pour empêcher l'exécution de tout code ultérieur
}
//cette page peut éventuellement recevoir le formulaire de commentaire
if(isset($_POST)&&!empty($_POST)){
    $post_id = $_GET['id'];
    $user_id = $_SESSION['user']['id'];
    $content = $_POST['content'];
    CommentManager::addComment($post_id, $user_id, $content);
    //header("location:single.php?id=$post_id&status=success&message=Votre commentaire a bien été ajouté");
}

//categories for navbar
$categories = CategoryManager::getAllCategories();


require_once './views/singleView.php';
