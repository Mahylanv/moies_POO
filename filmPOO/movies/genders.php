<?php
require('config/settings.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include("partials/head.php") ?>
    <title>Genres</title>
</head>
<body>
<?php require('partials/header.php')?>
<main>
    <h1>Liste des genres</h1>
    <?php $all = Gender::all(); ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($all as $v) : ?>
            <tr>
                <td><?= $v->getId() ?></td>
                <td><a href="uniqueGender.php?id=<?= $v->getId() ?>"><?= $v->getName() ?></a></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
    <button class="menu">Ajouter un genre</button>
    <div class="texte">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1>Ajouter un genre</h1>
            <p>
                <input type="text" name="name" placeholder="Le nom du genre">
            </p>
            <p>
                <button class="validate" type="submit" name="addGender">Ajouter</button>
            </p>
        </form>
    </div>
</main>
<?php include("partials/footer.php") ?>
</body>
</html>