<?php

require_once './views/partials/header.php';
?>
<?php if (isset($alertMessage) && isset($alertType)) : ?>
    <div class=" mt-3 alert alert-<?php echo $alertType; ?>" role="alert">
        <?php echo $alertMessage; ?>
    </div>
<?php endif; ?>

<h1 class="text-center text-light mt-5"> Se Connecter</h1>
<div class="container">
    <form action="" method="POST">
        <div class="mb-3">
            <label for="InputMail" class="form-label">Votre Email</label>
            <input type="email" class="form-control w-75" id="InputMail" name="mail">
        </div>
        <div class="mb-5">
            <label for="InputPassword" class="form-label">Votre Mot de passe</label>
            <input type="password" class="form-control w-75" id="InputPassword" name="password">
        </div>
        <button class="btn btn-warning" type="submit">Se connecter</button>
    </form>
</div>





<?php
require_once './views/partials/footer.php';
?>