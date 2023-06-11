<?php
require_once './views/partials/header.php';
// require_once './views/partials/navigation.php';
?>


<div class="container" style="margin-top: 68px;">
    <h1 class="text-center mt-5 text-light">Editer un article</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="InputTitle" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title" id="InputTitle" value="<?= $post->getTitle() ?>">
        </div>
        <div class=" mb-3">
            <label for="InputResume" class="form-label">Résumé</label>
            <input type="text" class="form-control" name="resume" id="InputResume" value="<?= $post->getResume() ?>">
        </div>

        <div class="mb-3">
            <label for="InputPicture" class="form-label">Image</label>
            <input type="file" class="form-control" name="picture" id="InputPicture">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenu</label>
            <textarea type="textarea" class="form-control" row="9" name="content" id="content"><?= $post->getContent() ?>"></textarea>
        </div>
        <div class="mb-3">
            <label for="InputAdress" class="form-label">adress</label>
            <input type="text" class="form-control" name="adress" id="InputAdress" placeholder="Ville - Pays" value="<?= $post->getAdress() ?>">
        </div>
        <?php foreach ($categories as $category) { ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $category->getIdCategory() ?>" name="categories[]" id="<?php echo $category->getName() ?>">
                <label class="form-check-label" for="<?php echo $category->getName() ?>">
                    <?php echo $category->getName(); ?>
                </label>
            </div>
        <?php } ?>

        <button type="submit" class="btn btn-warning mt-3">Editer</button>

    </form>
</div>

<?php
require_once './views/partials/footer.php';
?>