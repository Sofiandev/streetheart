<?php

require_once "model/managers/PostManager.php";

//le but de la page d'accueil étant d'accueillir tous les articles, on récupère tous les articles
$posts = PostManager::getAllPosts();

require_once './views/indexView.php';
