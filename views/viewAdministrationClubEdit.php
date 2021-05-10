<?php $this->_t = 'Edition de club M2L'; ?>

    <nav class="admnav">
        <div class="admnav-cell"><a href="<?=URL?>administration">Page principale</a></div>
        <div class="admnav-cell"><a href="<?=URL?>administration/ligues">Gestion des ligues</a></div>
        <div class="admnav-cell selected"><a href="<?=URL?>administration/clubs">Gestion des clubs</a></div>
    </nav>
   <h1>Edition</h1>

<?php if(isset($club)):?>

    <form id="editLigue" action="<?=URL?>/administration/clubs/editer/<?=$club->getNomClub() ?>" method="POST">
        <h1>Editer <?=$club->getNomClub() ?></h1>

        <a>Nom :</a>
        <input type="text" name="name" value="<?=$club->getNomClub() ?>" /><br />
        <a>Adresse :</a>
        <textarea cols="100" form="editLigue" name="adresse" ><?=$club->getAdresseClub() ?></textarea>
        <a>Ligue :</a>
        <input type="text" name="ligue" value="<?=$club->getLigue() ?>" /><br />

        <input class="yellow-btn" type="submit" value="Appliquer" />
    </form>

<?php else: ?>

    <div class="error">Ce club n'existe pas !</div>

<?php endif; ?>




