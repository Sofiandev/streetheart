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

    public static function getPostById($id)
    {
        $db = dbconnect();

        $sql = ("SELECT * FROM post WHERE id_post = :id");
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $post = $stmt->fetch();
        return $post;
    }


    public static function getPostsByCategoryId($id)
    {
        $db = dbconnect();
        $sql = "SELECT * FROM post JOIN post_category ON post_category.id_post = post.id_post WHERE post_category.id_category = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function getPostsByUserId($id)
    {
        $db = dbconnect();
        $sql = "SELECT * FROM post JOIN user ON user.id_user = post.id_user WHERE post.id_user = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function addPost($title, $resume, $picture, $content, $adress, $userId)
    {
        $db = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $sql = "INSERT INTO post (title, resume, picture, content, adress, datetime, id_user) VALUES(:title, :resume, :picture, :content, :adress,'$date', :id_user)";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':resume', $resume);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':adress', $adress);
        $stmt->bindParam(':id_user',  $userId);
        $stmt->execute();
        return $db->lastInsertId();
    }
    public static function addPostCategories($id_post, $id_category)
    {
        $db  = dbconnect();
        $sql = "INSERT INTO post_category (id_post, id_category) VALUES (:post, :cat)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':post', $id_post);
        $stmt->bindParam(':cat', $id_category);
        $stmt->execute();
    }

    public static function deletePostCategoriesByPostId($id)
    {
        $db  = dbconnect();
        $sql = "DELETE FROM post_category WHERE post_category.id_post = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public static function deletePost($id)
    {
        $db  = dbconnect();
        $sql = "DELETE FROM post WHERE post.id_post = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    public static function editPost($id, $title, $resume, $picture, $content, $adress, $userId)
    {
        $db = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $sql = "UPDATE post SET title = :title,resume = :resume, datetime = '$date', picture = :picture, content = :content,adress = :adress, id_user = :id_user WHERE post.id_post = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':resume', $resume);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':adress', $adress);
        $stmt->bindParam(':id_user', $userId);
        $stmt->execute();
    }
}
