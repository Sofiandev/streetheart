<?php
require_once './views/partials/header.php';
?>
<a href="index.php">retour</a>


<h1 class="text-center mt-5 text-light">Ajouter une catégorie</h1>

<div class="container">
    <form action="" method="post">
        <div class="mb-3">
            <label for="InputName" class="form-label text-bold">Nom de la catégorie</label>
            <input type="text" class="form-control" id="InputName" name="name">
        </div>
        <button class="btn btn-info mt-3 text-light" type="submit">Ajouter</button>
    </form>
</div>

<?php
require_once './views/partials/footer.php';
?>