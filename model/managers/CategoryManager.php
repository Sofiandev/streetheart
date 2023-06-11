<?php
require_once './model/DBConnect.php';
require_once './model/classes/Category.php';

class CategoryManager
{

    public static function getAllCategories()
    {
        $db = dbconnect();
        $sql = ("SELECT * FROM category");
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories ?: [];
    }

    public static function getCategoryInfo($id)
    {
        $db = dbconnect();
        $sql = ("SELECT * FROM category WHERE id_category = :id");
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $category = $stmt->fetch();
        return $category;
    }
    public static function getCategoriesByPostId($id)
    {
        $db = dbconnect();
        $sql = ("SELECT cat.id_category, cat.name FROM category AS cat 
        JOIN post_category AS pc ON pc.id_category = cat.id_category 
        JOIN post AS p ON pc.id_post = p.id_post WHERE p.id_post = :id");

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $categories = $stmt->fetchall(PDO::FETCH_CLASS, "Category");
        return $categories;
    }

    public static function addCategory($name)
    {
        $db = dbconnect();
        $sql = "INSERT INTO category(name) VALUES (:name)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
    }
}
