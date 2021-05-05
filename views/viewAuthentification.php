<?php $this->_t = 'Authentification M2L'; ?>

    <form action="<?=URL?>/authentification/connexion" method="POST">
        <h1>Connexion</h1>

        <?php
        if(isset($errorMsg)):?>

            <div class="error"><?=$errorMsg?></div>

        <?php endif;?>

        <a>Email :</a>
        <input type="text" name="mail" placeholder="Email de connexion" /><br />
        <a>Mot de passe :</a>
        <input type="password" name="mdp" placeholder="Mot de passe"  /><br />
        <input class="yellow-btn" type="submit" value="Connexion" />
    </form>

<br>
Utilisateur de test : <br/>
login : test@test.fr <br/>
mot de passe : sio
