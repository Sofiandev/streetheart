<?php
session_start();
//on retire le tableau de donnée qui correspond à l'utilisateur de la variable $_SESSION
unset($_SESSION['user']);
//puis on redirige vers index avec un message de confirmation, pas besoin de vue ici
header('Location:index.php?status=success&message=deconnexion-reussie');
