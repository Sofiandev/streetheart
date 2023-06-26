<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreetHeart</title>
    <link rel="icon" href="../../public/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-lg-none" href=""><img src="./public/img/logo.png" alt="logo StreetHeart"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand d-none d-lg-block" href="index.php"><img src="./public/img/logo.png" alt=""></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark bg-dark">
                            <?php foreach ($categories as $category) { ?>
                                <li><a class="dropdown-item" href="category.php?id=<?= $category->getIdCategory() ?>"><?= $category->getName() ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>

                    <?php if (isset($_SESSION['user'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Mon compte
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark bg-dark">
                                <li><a class="dropdown-item" href="logout.php?message=deconnexion-reussie">Se déconnecter</a></li>
                                <li><a class="dropdown-item" href="addpost.php">Ecrire un article</a></li>
                                <li><a class="dropdown-item" href="addcategory.php">Ajouter une catégorie</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">S'inscrire</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>