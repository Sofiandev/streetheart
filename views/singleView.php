<?php

require_once './views/partials/header.php';
require_once './views/partials/navigation.php';
?>

<section id="hero">
    <img src="./public/img/articles/<?php echo $post->getPicture() ?>" class="img-fluid heroImg" alt="">
</section>

<section id="main" class="container">
    <h1 class="text-center"><?php echo $post->getTitle() ?></h1>
    <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $user->getIdUser()) {

    ?>
        <div class="d-flex justify-content-end">
            <a href="editpost.php?id=<?php echo $post->getIdPost() ?>" class="btn btn-warning me-2"><i class="bi bi-pencil-square text-light"></i></a>
            <a href="deletepost.php?id=<?php echo $post->getIdPost() ?>" class="btn btn-danger"><i class="bi bi-trash3-fill "></i></a>
        </div>
    <?php } ?>
    <div id="categories">
        <?php foreach ($postCategories as $category) { ?>
            <a href="category.php?id=<?php echo $category->getIdCategory() ?>" class="badge rounded-pill text-bg-primary"><?php echo $category->getName() ?></a>
        <?php } ?>
    </div>
    By <a href="author.php?id=<?= $user->getIdUser() ?>" id="user" class="muted"><?php echo $user->getName() ?></a>
    <p class="mt-3"><?php echo $post->getContent() ?></p>

    <div class="badge bg-primary mb-3">
        Commentaires <span class="badge text-bg-secondary"><?php echo count($comments) ?></span>
    </div>
    <div id="comments">
        <?php foreach ($comments as $comment) {
            $commentUser = UserManager::getUserByCommentId($comment->getIdComment()); ?>
            <div>
                <span><?php echo $comment->getDatetime() ?></span>
                <h4><?php echo $commentUser->getName() ?></h4>
                <p><?php echo $comment->getContent() ?></p>
            </div>
        <?php } ?>
    </div>
    <?php if (isset($_SESSION['user'])) { ?>

        <div id="addcomment">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="InputContent" class="form-label">Ajouter un commentaire</label>
                    <textarea class="form-control" id="InputContent" name="content"></textarea>
                    <input id="mail" type="hidden" value="<?php echo $_SESSION['user']['mail'] ?>">
                </div>
                <button class="btn btn-primary mt-3" type="submit">Soumettre le commentaire</button>
            </form>
        </div>
    <?php } ?>
</section>

<?php
var_dump($_SESSION['user']);
require_once "./views/partials/footer.php";


?>