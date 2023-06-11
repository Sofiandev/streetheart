<?php

require_once './model/DBConnect.php';
require_once './model/classes/User.php';

class UserManager
{

    public static function getUserInfos($id)
    {
        $db = dbconnect();

        $sql = "SELECT * FROM user WHERE id_user = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        $user = $stmt->fetch();

        return $user;
    }

    public static function getUserByPostId($id)
    {
        $db = dbconnect();
        $sql = "SELECT u.name, u.id_user FROM user AS u JOIN post AS p ON u.id_user = p.id_user WHERE p.id_post = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        $user = $stmt->fetch();
        return $user;
    }

    public static function getUserByCommentId($id){
        $db= dbconnect();
        $sql = "SELECT * FROM user AS u JOIN comment AS c ON u.id_user = c.id_user WHERE c.id_comment = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }


    public static function addUser($name, $pseudo, $age, $mail, $pass)
    {
        $db = dbconnect();
        $sql = "INSERT INTO user(name, pseudo, age, mail, password) VALUES(:name, :pseudo, :age, :mail, :pass)";
        $stmt = $db->prepare($sql);
        // connecter les variables php aux parametres sql
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindParam(':age', $age, PDO::PARAM_INT);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();

        // On connectera l'utilisateur
    }


    public static function getUserByMail($mail)
    {
        $db = dbconnect();
        $sql = "SELECT * FROM user WHERE user.mail = :mail";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }
    public static function connectUser($user)
    {
        session_start();
        $_SESSION['user'] = [
            'id' => $user->getIdUser(),
            'mail' => $user->getMail(),
        ];
    }
}
