<?php $this->_t = 'Gestion clubs M2L'; ?>

<nav class="admnav">
    <div class="admnav-cell"><a href="<?=URL?>administration">Page principale</a></div>
    <div class="admnav-cell"><a href="<?=URL?>administration/ligues">Gestion des ligues</a></div>
    <div class="admnav-cell selected"><a href="<?=URL?>administration/clubs">Gestion des clubs</a></div>

</nav>

<h1>Gestion des clubs :</h1>


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
            <h1>Editer un club</h1>

            <a>Nom :</a>
            <input type="text" name="name" placeholder="Nom du club" /><br />
            <input class="yellow-btn" type="submit" value="Editer" name="submitEdit"/>
        </form>

    </div>
    <div class="flex-item">

        <form id="addClub" action="" method="POST">
            <h1>Ajouter un club</h1>

            <a>Nom :</a>
            <input type="text" name="name" placeholder="Nom du club" /><br />
            <a>Adresse :</a>
            <textarea cols="100" form="addClub" name="adresse"></textarea>
            <a>Ligue associée :</a>
            <input type="text" name="ligue" placeholder="Nom de la ligue" /><br />

            <input class="yellow-btn" type="submit" value="Ajouter" name="submitAdd" />
        </form>

    </div>

    <div class="flex-item">

        <form action="" method="POST">
            <h1>Supprimer un club</h1>

            <a>Nom :</a>
            <input type="text" name="name" placeholder="Nom du club" /><br />
            <input class="yellow-btn" type="submit" value="Supprimer" name="submitDelete" />
        </form>

    </div>

</div>
