<?php
require_once "./views/partials/header.php";
require_once "./views/partials/navigation.php";

// Vérification du paramètre GET "message"
if (isset($_GET['message']) && $_GET['message'] === 'inscription-reussie') {
    // Afficher l'alerte de succès pour l'inscription réussie
    ?>
    <div class="alert alert-success mt-5 alert-overlay" role="alert">
        Inscription réussie.
    </div>
    <?php
} elseif (isset($_GET['message']) && $_GET['message'] === 'deconnexion-reussie') {
    // Afficher l'alerte de succès pour la déconnexion réussie
    ?>
    <div class="alert alert-success mt-5 alert-overlay" role="alert">
        Déconnexion réussie.
    </div>
    <?php
}

if (isset($_SESSION['connected']) && $_SESSION['connected'] === true) {
    // Afficher l'alerte pour l'utilisateur connecté
    ?>
    <div class="alert alert-success mt-5 alert-overlay" role="alert">
        Vous êtes bien connecté.
    </div>
    <?php
    unset($_SESSION['connected']);
}
?>
<div class="carousel slide position-relative" data-bs-ride="carousel" id="carouselExampleIndicators" style="margin-top: 68px;">
    <div class="carousel-indicators">
        <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img alt="..." class="d-block w-100 h-auto" src="./public/img/carrousel2.jpg">
            <div class="carousel-caption">
                <h5 class="animated bounceInRight" style="animation-delay: 1s">Les murs ont des histoires à raconter</h5>
                <h6 class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s">Streetheart vous les fait découvrir</h6>
                <p class="animated bounceInRight" style="animation-delay: 3s"><a href="#" class="btn btn-warning">Voir plus</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="..." class="d-block w-100 h-auto" src="./public/img/ashim-d-silva.jpg">
            <div class="carousel-caption">
                <h5 class="animated bounceInRight" style="animation-delay: 1s">Plongez dans l'univers créatif</h5>
                <p class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s">Explorez la beauté de l'art urbain avec Streetheart.</p>
                <p class="animated bounceInRight" style="animation-delay: 3s"><a href="#">Voir plus</a></p>
            </div>
        </div>
        <div class="carousel-item">
            <img alt="..." class="d-block w-100 h-auto" src="./public/img/bogota1.jpg">
            <div class="carousel-caption">
                <h5 class="animated bounceInRight" style="animation-delay: 1s">Apprentissage d'un art</h5>
                <p class="animated bounceInLeft d-none d-md-block" style="animation-delay: 2s">Découvrez les techniques uniques à travers le monde </p>
                <p class="animated bounceInRight" style="animation-delay: 3s"><a href="#">Voir plus</a></p>
            </div>
        </div>
    </div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
</div>
<h1 class="text-center m-5 text-light">Découvrez les derniers articles pour en prendre pleins les yeux !</h1>

<div class="bloc-container">
    <?php foreach ($posts as $post) { ?>
        <div class="bloc-card">
            <div class="card__header inner">
                <img src="./public/img/articles/<?= $post->getPicture() ?>" alt="<?= "photo" . $post->getTitle() ?>" class=" bloc-img card__image" width="600" height="200">
            </div>
            <div class="card__body">
                <h4><?= $post->getTitle() ?></h4>
                <p><?= $post->getResume() ?></p>
            </div>
            <div class="card__footer">
                <div class="user">
                    <div class="user__info">
                        <span><?php echo date_format(date_create($post->getDatetime()), 'd-m-Y H:i'); ?></span>
                    </div>
                    <a href="single.php?id=<?= $post->getIdPost() ?>" class="btn register-btn text-center ms-3">Voir l'article</a>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
<?php
require_once "./views/partials/footer.php";
?>