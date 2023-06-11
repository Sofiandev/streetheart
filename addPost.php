<?php
session_start();
require_once './model/managers/PostManager.php';
require_once './model/managers/CategoryManager.php';

$categories = CategoryManager::getAllCategories();

if (isset($_SESSION['user'])) { // je vérifie que j'ai un user
    if (isset($_POST) && !empty($_POST)) { // je vérifie que j'ai bien reçu des données en POST
        $title = $_POST['title'];
        $resume = $_POST['resume'];
        $uploads_dir = 'public/img/articles';
        if (isset($_FILES['picture']['tmp_name']) && is_uploaded_file($_FILES['picture']['tmp_name'])) {
            $tmp_location = $_FILES['picture']['tmp_name'];
            $random_string = uniqid();
            $picture = $random_string . '-' . $_FILES['picture']['name'];
            move_uploaded_file($tmp_location, "$uploads_dir/$picture");
        }

        $content = $_POST['content'];
        $adress = $_POST['adress'];
        $userId = $_SESSION['user']['id'];
        $newPostId = PostManager::addPost($title, $resume, $picture, $content, $adress, $userId);

        $postCategories = $_POST['categories'];
        foreach ($postCategories as $cat) {
            PostManager::addPostCategories($newPostId, $cat);
        }
        require_once './views/addPostView.php';
    } else {
        require_once './views/addPostView.php';
    }
} else {
    header('location:login.php?status=danger&message=Vous devez être connecté pour ajouter un article');
}
