<?php $this->_t = 'Edition de ligue M2L'; ?>

    <nav class="admnav">
        <div class="admnav-cell"><a href="<?=URL?>administration">Page principale</a></div>
        <div class="admnav-cell selected"><a href="<?=URL?>administration/ligues">Gestion des ligues</a></div>
        <div class="admnav-cell"><a href="<?=URL?>administration/clubs">Gestion des clubs</a></div>
    </nav>
   <h1>Edition</h1>

<?php if(isset($ligue)):?>

    <form id="editLigue" action="<?=URL?>/administration/ligues/editer/<?=$ligue->getNomLigue() ?>" method="POST">
        <h1>Editer <?=$ligue->getNomLigue() ?></h1>

        <a>Nom :</a>
        <input type="text" name="name" value="<?=$ligue->getNomLigue() ?>" /><br />
        <a>Description :</a>
        <textarea cols="100" form="editLigue" name="description" ><?=$ligue->getDescriptifLigue() ?></textarea>
        <a>Site :</a>
        <input type="text" name="site" value="<?=$ligue->getSiteLigue() ?>" /><br />

        <input class="yellow-btn" type="submit" value="Appliquer" />
    </form>

<?php else: ?>

    <div class="error">Cette ligue n'existe pas !</div>

<?php endif; ?>




