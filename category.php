<?php 
session_start(); 
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/PostManager.php';

//recoit l'id de la catégorie pour afficher les bonnes infos 
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $categoryInfo = CategoryManager::getCategoryInfo($id);
    if(!$categoryInfo){ //si on recoit un id qui ne correspond pas à une catégorie, on redirige vers la page d'erreur 
        header('location:404.php');
    }
    $categoryPosts = PostManager::getPostsByCategoryId($id);
}else{//si pas d'id => page d'erreur
    header('location:404.php');
}

$categories = CategoryManager::getAllCategories();

require_once 'views/categoryView.php';
