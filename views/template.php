<!DOCTYPE html>
<html>
    <head>
        <meta charset="uft-8"/>
        <link rel="stylesheet" type="text/css" href="<?=URL?>views/styles/style.css" />
        <title><?= $t ?></title>
    </head>
    <header>

        <nav id="navbar">
            <div class="nav-cellule header-logo"> <a href="<?=URL?>"><img src="<?=URL?>views/images/logo_lorraine.svg" alt="logo"/></a> </div>
            <div class="nav-cellule"><a href="<?=URL?>">Accueil</a></div>
            <div class="nav-cellule"><a href="<?=URL?>ligues">Ligues</a></div>
            <?php  if(isLoggedOn()) :?>
                <div class="nav-cellule"><a href="<?=URL?>administration">Administration</a></div>
                <div class="nav-cellule"><a href="<?=URL?>authentification/deconnexion">Déconnexion</a></div>
            <?php else: ?>
                <div class="nav-cellule"><a href="<?=URL?>authentification">Authentification</a></div>
            <?php endif; ?>
        </nav>
    </header>

    <div class="corps">
        <?= $content ?>
    </div>

    <footer>

        <p>Copyright © 2021 M2L - Tous droits réservés. </p>

    </footer>
</html>