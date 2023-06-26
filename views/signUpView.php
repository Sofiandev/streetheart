<?php
require_once './views/partials/header.php';
?>

<section class="main" style="margin-top: 68px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-12 d-flex align-items-center">
                <div class="text text-center">
                    <h1 class="text-white">Créez des expériences exceptionnelles</h1>
                    <h2 class="text-white">En devenant membre de StreetHeart</h2>
                </div>
            </div>
            <div class="col-lg-5 col-md-10 col-sm-12">
                <div class="form-box px-5 py-4">
                    <form action="" method="POST">
                        <h2 class="text-center mb-4">Créer un compte</h2>
                        <input type="text" name="name" id="name" placeholder="Nom" class="form-control mb-3">
                        <input type="text" name="pseudo" placeholder="Pseudo" class="form-control mb-3">
                        <input type="number" name="age" placeholder="Age" class="form-control mb-3">
                        <input type="email" name="mail" placeholder="Email" class="form-control mb-3">
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" placeholder="*******" class="form-control border-end-0 ">
                            <span class="input-group-text bg-white border-start-0"><i class="fa-solid fa-eye"></i></span>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" name="" id="terms" required><label><small class="ms-3"> En m'inscrivant, j'accepte les conditions d'utilisation</small></label>
                        </div>
                        <button type="submit" class="register-btn form-control mb-3">S'inscrire</button>
                        <p class="text-center">Déjà membre ? <a href="./login.php" class="link">Se connecter</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once './views/partials/footer.php';

?>