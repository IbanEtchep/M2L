<?php $this->_t = 'Ligues M2L'; ?>

<h1>Liste des ligues</h1>

<table>

    <thead>
    <tr>
        <td>Nom</td>
        <td>Description</td>
        <td>Clubs</td>
        <td>Site</td>

    </tr>
    </thead>

    <tbody>
    <?php if(isset($ligues)): ?>
        <?php foreach ($ligues as $ligue) : ?>
            <tr>
                <td><?=$ligue->getNomLigue()?></td>
                <td><?=$ligue->getDescriptifLigue()?></td>

                <td>
                    <?php $clubs = $ligue->getClubs(); ?>

                    <?php if ($clubs != null) : ?>
                        <?php foreach ($clubs as $club) : ?>
                            <a>- <?=$club->getNomClub() ?></a><br>
                        <?php endforeach ?>
                    <?php else: ?>
                        <a>Aucun</a>
                    <?php endif;?>
                </td>

                <td><a href="<?=$ligue->getSiteLigue()?>"><?=$ligue->getSiteLigue()?></a> </td>
            </tr>
        <?php endforeach ?>
    <?php else: ?>
        <div class="error">Aucune ligue n'a été trouvée.</div>
    <?php endif;?>
    </tbody>

</table>
