<?php
require("config/settings.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("partials/head.php") ?>
    <title>Films</title>
</head>

<body>

<?php include("partials/header.php") ?>
<main>
    <h1>Liste des films</h1>
    <?php $all = Movie::all(); ?>
    <table class="table">
        <thead>
        <tr>
            <th>Titre</th>
            <th>IMDB</th>
            <th>Genre</th>
            <th>Nombre de personnages</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($all as $a) :  ?>
            <tr>
                <td><a href="uniqueMovie.php?id=<?= $a->getId() ?>"><?= $a->getTitle() ?></a></td>
                <td><a target="_blank" href="https://www.imdb.com/title/<?= $a->getImdb() ?>/?ref_=nm_knf_t_1"><?= $a->getImdb() ?></a></td>
                <td><a href="uniqueGender.php?id=<?= $a->getId() ?>"><?= $a->getGender()->getName() ?></a></td>
                <td>
                    <?php $characters = Character::allCondition($a->getId());
                    if (empty($characters)) :
                        ?>
                        0
                    <?php else : $characters = Character::allCondition($a->getId());
                        $characterCount = 0;
                        if (!empty($characters)) {
                            foreach ($characters as $character) {
                                $characterCount++;
                            } ?>
                            <?= $characterCount ?>
                    <?php } endif ?>
                </td>
            </tr>

        <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php include("partials/footer.php") ?>
</body>

</html>