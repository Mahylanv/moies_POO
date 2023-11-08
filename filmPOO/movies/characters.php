<?php
require("config/settings.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include("partials/head.php") ?>
    <title>Accueil</title>
</head>

<body>

<?php include("partials/header.php") ?>
<main>
    <?php $all = Character::all(); ?>
    <h1>Liste des personnages</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Film</th>
            <th>Genre</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($all as $a) :  ?>
            <tr>
                <td><a href="uniqueCharacter.php?id=<?= $a->getId() ?>"><?= $a->getName() ?></a></td>
                <td><a href="uniqueMovie.php?id=<?= $a->getMovie_id() ?>"><?= $a->getMovie()->getTitle() ?></a></td>
                <td><a href="uniqueGender.php?id=<?= $a->getMovie()->getGender_id() ?>"><?= $a->getMovie()->getGender()->getName() ?></a></td>
            </tr>

        <?php endforeach ?>
        </tbody>
    </table>

    <button class="menu">Ajouter un personnage</button>
    <div class="texte">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <h1>Ajouter un personnage</h1>
            <p>
                <input type="text" placeholder="Nom du personnage" name="name">
            </p>
            <select name="movie_id">
                <option selected>Sélectionner un film</option>
                <?php $all = Movie::all();
                foreach ($all as $a) :
                    ?> <option value="<?= $a->getId() ?>"><?= $a->getTitle() ?></option>
                <?php endforeach ?>
            </select>
            <div>
                <button type="submit" class="validate" name="addCharacter">Valider</button>
            </div>
        </form>
    </div>
</main>
</body>
<?php include("partials/footer.php") ?>
</html>