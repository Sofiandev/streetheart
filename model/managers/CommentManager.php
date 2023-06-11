<?php

require_once './model/classes/Comment.php';

class CommentManager
{

    public static function getCommentsByIdPost($id)
    {
        $db = dbconnect();

        $sql = "SELECT * FROM comment WHERE comment.id_post = :id ORDER BY datetime DESC " ;
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;
    }

    public static function addComment($id_post, $id_user, $content)
    {

        $db = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s'); //ajouter la date car nécessaire à l'enregistrement du commentaire 
        $sql = "INSERT INTO comment(id_post, id_user, content, datetime) VALUES(:idPost, :idUser, :content, '$date')";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":idPost", $id_post);
        $stmt->bindParam(":idUser", $id_user);
        $stmt->bindParam(":content", $content);
        $stmt->execute();
    }

    public static function deleteCommentByPostId($id)
    {
        $db = dbconnect();
        $sql = "DELETE FROM comment WHERE comment.id_post= :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
