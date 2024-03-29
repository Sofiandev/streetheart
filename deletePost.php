<?php
session_start();
require_once 'model/managers/PostManager.php';
require_once 'model/managers/CommentManager.php';
require_once 'model/managers/UserManager.php';

//on check si on reçoit bien un id de post a supprimer
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $user = UserManager::getUserByPostId($id);
    //on vérifie que l'utilisateur en cours est bien l'auteur de l'article
    if($user->getIdUser() != $_SESSION['user']['id']){
        header("location:index.php?status=danger&message=Vous n'avez pas l'autorisation de faire cette action");
        die; //si ce n'est pas le cas on quitte le script immédiatement après avoir redirigé le coquin 
    }
    //pour la suppression, il faut retirer les liaisons de l'article avant celui ci
    //commençons par les catégories
    PostManager::deletePostCategoriesByPostId($id);
    //on continue avec les commentaires
    // CommentManager::deleteCommentsByPostId($id);
    //on peut enfin effacer le post 
    PostManager::deletePost($id);
    header("location:index.php?status=success&message=L'article a bien été supprimé");
}



