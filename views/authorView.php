<?php
require_once 'partials/header.php';
?>
<div style="margin-top: 68px;"></div>
<h1 class="text-center mt-3"><?php echo $user->getName() ?></h1>
<div class="bloc-container">
    <?php foreach ($userPosts as $post) { ?>
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
require_once 'partials/footer.php';
?>