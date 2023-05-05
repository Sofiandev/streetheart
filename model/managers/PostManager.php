<?php

//le rôle du manager étant d'interagir avec la bdd, c'est ici que l'on va récupérer le fichier qui contient la fonction correspondante

require_once "./model/DBConnect.php";

//nous allons transcrire les données récupérées sous la forme d'objets de la classe Post, nous devons donc inclure le fichier correspondant 

require_once "./model/classes/Post.php";

class PostManager
{

    //on va ensuite définir différentes méthodes très ciblées

    public static function getAllPosts()
    {
        //on récupère tous les articles
        //on se connecte à la bdd
        $db = dbconnect();

        //on écrit notre requete
        $sql = ("SELECT * FROM post");

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, "Post");

        return $posts;

    }
}
