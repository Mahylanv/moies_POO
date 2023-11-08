<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$movie = new Movie($_GET["id"]);
if (empty($movie->getId())) {
    header("Location: index.php");
    exit();
}
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
    <article>

        <h2>
            <?= $movie->getTitle(); ?>
        </h2>
        <p>
            Genre:
            <a href="uniqueGender.php?id=<?= $movie->getId() ?>"><?= $movie->getGender()->getName() ?></a></p>
        <p>
            Numéro IMDB :
            <a target="_blank" href="https://www.imdb.com/title/<?= $movie->getImdb() ?>/?ref_=nm_knf_t_1"><?= $movie->getImdb() ?></a>
        </p>
        <?php $characters = Character::allCondition($movie->getId());
        if (empty($characters)) :
            ?>
            <p>Le film n'a pas de personnage enregistré</p>
        <?php else : ?>
            <div>
                <p>Personnages :</p>
                <?php foreach ($characters as $character) :  ?>
                    <p>
                        <a href="uniqueCharacter.php?id=<?= $character->getId() ?>"><?= $character->getName() ?></a>
                    </p>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
    </article>

    <button class="menu">Ajouter un personnage</button>
    <div class="texte">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <h1>Ajouter un personnage</h1>
            <p>
                <input type="text" placeholder="Nom du personnage" name="name">
            </p>
            <p>
                <input type="hidden" placeholder="Nom du personnage" name="movie_id" value="<?= $movie->getId() ?>">
            </p>
            <div>
                <button type="submit" class="validate" name="addCharacter">Valider</button>
            </div>
        </form>
    </div>

    <button class="menu">Modifier le film</button>
    <div class="texte">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <h1>Modifier un film</h1>
            <input type="hidden" placeholder="Titre du film" name="id" value="<?= $movie->getId() ?>">
            <p>
                <input type="text" placeholder="Titre du film" name="title" value="<?= $movie->getTitle() ?>">
            </p>
            <p>
                <input type="text" placeholder="Numéro IMDB" name="imdb" value="<?= $movie->getImdb() ?>">
            </p>
            <select name="gender_id">
                <<?php $all = Gender::all();
                foreach ($all as $a) :
                    $a->getId() === $movie->getGender_id() ? $selected = "selected" : $selected = "";
                    ?> <option <?= $selected ?> value="<?= $a->getId() ?>"><?= $a->getName() ?></option>
                <?php endforeach ?>
            </select>
            <div class="flex">
                <button type="submit" class="delete" name="deleteMovie">Supprimer</button>
                <button type="submit" class="validate" name="updateMovie">Valider</button>
            </div>
        </form>
    </div>
</main>
<?php include("partials/footer.php") ?>
</body>
</html>