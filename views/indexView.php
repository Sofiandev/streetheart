<?php
require_once "./views/partials/header.php";
require_once "./views/partials/navigation.php";
?>

<header>
<h1 class="text-center m-5">Les murs ont des histoires à raconter - Streetheart vous les fait découvrir</h1>

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
</div>
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="./public/img/rio-de-janeiro-1.jpg" class="d-block w-75" alt="...">
    </div>
    <div class="carousel-item">
        <img src="./public/img/tiger.jpg" class="d-block w-75" alt="...">
    </div>
    <div class="carousel-item">
        <img src="./public/img/Bansky_3.jpg" class="d-block w-75" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
</button>
</div>
</header>
<section id="homepage" class="pt-2">
    
    <div class="container mt-5">
        <div class="row">
            <?php foreach($posts as $post) { ?>
                <div class="card col-12 col-md-4 col-lg-3">
                    <img src="assets/uploads/<?php echo $post->getPicture() ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
                        <a href="single.php?id=<?php echo $post->getIdPost() ?>" class="btn btn-primary">Voir l'article</a>
                    </div>
                </div>
            <?php } ?> 
        </div>
    </div>
</section>

<?php
require_once "./views/partials/footer.php";
?>