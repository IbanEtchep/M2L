<?php $this->_t = 'Accueil M2L'; ?>

    <h1>Connexion</h1>

    <?php
    if(isset($errorMsg)):?>

    <div class="error"><?=$errorMsg?></div>

    <?php endif;?>


    <form action="./authentification/connexion" method="POST">
        <input type="text" name="mail" placeholder="Email de connexion" /><br />
        <input type="password" name="mdp" placeholder="Mot de passe"  /><br />
        <input type="submit" value="Connexion" />
    </form>


<br>
Utilisateur de test : <br/>
login : test@test.fr <br/>
mot de passe : sio
