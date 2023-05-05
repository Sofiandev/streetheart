<?php

require_once "model/managers/PostManager.php";

//le but de la page d'accueil étant d'accueillir tous les articles, on récupère tous les articles
$posts = PostManager::getAllPosts();


require_once "./views/partials/header.php";
require_once "./views/partials/navigation.php";
?>

<section id="homepage" class="pt-2">
    <h1 class="text-center mt-5">Bienvenue sur mon blog à propos de mes mangas préférés</h1>


    </body>

    </html>

    <?php
    require_once "./views/partials/footer.php";
    ?>