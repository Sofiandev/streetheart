<?php 

session_start();

require_once "./model/managers/UserManager.php";
require_once "./model/managers/PostManager.php";
require_once "./model/managers/CategoryManager.php";

// var_dump($_SESSION['user']);
//vérifier qu'on recoit bien un id
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $user = UserManager::getUserByPostId($id);
    // var_dump($user->getIdUser());
    //on vérifie que l'utilisateur en cours est bien l'auteur de l'article
    if($user->getIdUser()!==$_SESSION['user']['id']){
        header("location:index.php?status=danger&message=Vous n'avez pas l'autorisation de faire cette action");
        die; //si ce n'est pas le cas on quitte le script immédiatement après avoir redirigé le coquin 
    } 
    //récupérer les données du post pour les envoyer dans la vue
    $post = PostManager::getPostById($id);
    $post_categories = CategoryManager::getCategoriesByPostId($id);
}

//si on a des données en POST 
if(isset($_POST)&&!empty($_POST)){
    $title = $_POST['title'];
    $resume = $_POST['resume'];
    ///!\ pour l'image qui ne sera pas envoyé si elle est pas modifiée /!\
    //si on reçoit une nouvelle image, on s'en occupe
    if(isset($_FILES['picture']['name'])&&!empty($_FILES['picture']['name'])){
        // var_dump($_FILES);
        $uploads_dir = 'public/img/articles';
        $tmp_location = $_FILES['picture']['tmp_name'];
        $random_string = uniqid(); //ici je génère une chaine de caractère aléatoire basée sur l'heure car le serveur écrase les fichiers qui ont le même nom
        $picture = $random_string.'-'.$_FILES['picture']['name'];//on génère un nouveau nom en concaténant les chaines aléatoires et le nom de l'image
        move_uploaded_file($tmp_location, "$uploads_dir/$picture");// on déplace de l'emplacement temporaire vers le dossier de destination sur le serveur
    } else { 
        //sinon, on va redonner à $picture la valeur qu'elle a déjà en bdd
        $picture = $post->getPicture();
    }
    $content = $_POST['content'];
    $adress = $_POST['adress'];
    $userId = $_SESSION['user']['id'];
    //faire appel à une fonction pour UPDATE les infos de l'article
    PostManager::editPost($id, $title, $resume, $picture, $content, $adress, $userId);
    //supprimer les catégories déjà en bdd pour l'article
    PostManager::deletePostCategoriesByPostId($id);
    //enregistrer les nouvelles
    $postCategories = $_POST['categories'];
    foreach($postCategories as $cat){
        PostManager::addPostCategories($id, $cat);
    }
    header("location:single.php?id=$id&status=success&message=L'article a bien été mis à jour");
}  

//toutes nos catégories pour le menu de navigation
$categories = CategoryManager::getAllCategories();

require_once 'views/editpostView.php';

