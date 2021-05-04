<!DOCTYPE html>
<html>
    <head>
        <meta charset="uft-8"/>
        <link rel="stylesheet" href="views/styles/style.css" />
        <title><?= $t ?></title>
    </head>
    <header>

        <nav id="navbar">
            <div class="nav-cellule header-logo"> <a href="<?=URL?>"><img src="views/images/logo_lorraine.svg" alt="logo"/></a> </div>
            <div class="nav-cellule"><a href="<?=URL?>">Accueil</a></div>
            <div class="nav-cellule"><a href="<?=URL?>ListLigues">Ligues</a></div>
            <div class="nav-cellule"><a href="espaceclient.php">Espace Client</a></div>
        </nav>
    </header>

    <div class="corps">
        <?= $content ?>
    </div>

    <footer>

        <p>Copyright © 2021 M2L - Tous droits réservés. </p>

    </footer>
</html>