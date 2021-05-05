<?php $this->_t = 'Accueil M2L'; ?>

    <h1>Liste des ligues</h1>

    <table>

        <thead>
            <tr>
                <td>Nom</td>
                <td>Description</td>
                <td>Site</td>

            </tr>
        </thead>

        <tbody>
        <?php foreach ($ligues as $ligue) : ?>
            <tr>
                <td><?=$ligue->getNomLigue()?></td>
                <td><?=$ligue->getDescriptifLigue()?></td>
                <td><a href="<?=$ligue->getSiteLigue()?>"><?=$ligue->getSiteLigue()?></a> </td>
            </tr>
        <?php endforeach ?>
        </tbody>

    </table>
