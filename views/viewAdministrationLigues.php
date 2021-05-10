<?php $this->_t = 'Gestion ligues M2L'; ?>

<nav class="admnav">
    <div class="admnav-cell"><a href="<?=URL?>administration">Page principale</a></div>
    <div class="admnav-cell selected"><a href="<?=URL?>administration/ligues">Gestion des ligues</a></div>
    <div class="admnav-cell"><a href="<?=URL?>administration/clubs">Gestion des clubs</a></div>

</nav>

<h1>Gestion des ligues :</h1>


<?php
if(isset($errorMsg)):?>
    <div class="error"><?=$errorMsg?></div>
<?php endif;?>

<?php
if(isset($successMsg)):?>
    <div class="success"><?=$successMsg?></div>
<?php endif;?>

<div class="flex-container">

    <div class="flex-item">

        <form action="" method="POST">
            <h1>Editer une ligue</h1>

            <a>Nom :</a>
            <input type="text" name="name" placeholder="Nom de la ligue" /><br />
            <input class="yellow-btn" type="submit" value="Editer" name="submitEdit"/>
        </form>

    </div>
    <div class="flex-item">

        <form id="addLigue" action="" method="POST">
            <h1>Ajouter une ligue</h1>

            <a>Nom :</a>
            <input type="text" name="name" placeholder="Nom de la ligue" /><br />
            <a>Description :</a>
            <textarea cols="100" form="addLigue" name="description"></textarea>
            <a>Site :</a>
            <input type="text" name="site" placeholder="https://example.com/" /><br />

            <input class="yellow-btn" type="submit" value="Ajouter" name="submitAdd" />
        </form>

    </div>

    <div class="flex-item">

        <form action="" method="POST">
            <h1>Supprimer une ligue</h1>

            <a>Nom :</a>
            <input type="text" name="name" placeholder="Nom de la ligue" /><br />
            <input class="yellow-btn" type="submit" value="Supprimer" name="submitDelete" />
        </form>

    </div>

</div>
