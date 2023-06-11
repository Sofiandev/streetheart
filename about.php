<?php
session_start();
require_once "./model/managers/PostManager.php";
require_once "./model/managers/UserManager.php";
require_once "./model/managers/CategoryManager.php";

$categories = CategoryManager::getAllCategories();
require_once './views/partials/header.php';

?>

<section class="about-section" style="margin-top: 100px;">
    <div class="container">
        <h1 class="text-center text-light">À propos de StreetHeart</h1>
        <p class="text-center mb-5">Bienvenue sur StreetHeart, le lieu de rendez-vous des passionnés de street art du monde entier.</p>

        <div class="row">
            <div class="col-md-6 mt-5">
                <h2>Notre Mission</h2>
                <p>Notre mission est de promouvoir et de partager la beauté du street art à travers le monde. Nous croyons que l'art urbain est une forme d'expression puissante qui peut transformer les espaces publics et éveiller les consciences. StreetHeart est donc dédié à la célébration de cet art unique.</p>
            </div>
            <div class="col-md-6 mt-5">
                <img src="./public/img/about1.jpg" alt="Mission" class="img-fluid w-75 mb-3">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <img src="./public/img/about2.jpg" alt="Communauté" class="img-fluid w-75 mb-3">
            </div>
            <div class="col-md-6">
                <h2>Notre Communauté</h2>
                <p>Nous avons construit une communauté dynamique de passionnés du street art, allant des artistes aux amateurs. StreetHeart est l'endroit idéal pour découvrir de nouvelles œuvres, échanger des idées, partager des expériences et interagir avec d'autres passionnés de street art.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Comment ça marche</h2>
                <p>Sur StreetHeart, vous pouvez créer un compte gratuit et commencer à publier vos propres articles sur le street art. Vous pouvez partager vos photos, raconter des histoires, donner des conseils et inspirer les autres membres de la communauté. Nous encourageons la diversité des perspectives et des styles artistiques.</p>
            </div>
            <div class="col-md-6">
                <img src="./public/img/about3.jpg" alt="Comment ça marche" class="img-fluid w-75 mb-3">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <img src="./public/img/about4.png" alt="Restons connectés" class="img-fluid w-75 mb-3">
            </div>
            <div class="col-md-6">
                <h2>Restons connectés</h2>
                <p>Nous sommes heureux de rester connectés avec vous ! Rejoignez-nous sur les réseaux sociaux pour découvrir les dernières actualités, les événements street art à venir et les artistes en vogue. Vous pouvez également vous abonner à notre newsletter pour recevoir des mises à jour régulières dans votre boîte de réception.</p>
            </div>
        </div>
    </div>
</section>

<?php
require_once './views/partials/footer.php';
?>