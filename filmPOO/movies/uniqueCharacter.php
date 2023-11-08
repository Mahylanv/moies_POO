<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$character = new Character($_GET["id"]);
if (empty($character->getId())) {
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
        <h2>Personnage : <?= $character->getName(); ?></h2>
        <p>Dans le film : <a href="uniqueMovie.php?id=<?= $character->getMovie_id() ?>"><?= $character->getMovie()->getTitle() ?></a></p>
        <p>du genre : <a href="uniqueGender.php?id=<?= $character->getMovie()->getGender_id(); ?>"><?= $character->getMovie()->getGender()->getName(); ?></a></p>
    </article>

    <button class="menu">Modifier le personnage</button>
    <div class="texte">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <h1>Modifier <?= $character->getName() ?></h1>
            <input type="hidden" name="id" value="<?= $character->getId() ?>">
            <p>
                <input type="text" placeholder="Nom du personnage" name="name" value="<?= $character->getName() ?>">
            </p>
            <select name="movie_id">
                <<?php $all = Movie::all();
                foreach ($all as $a) :
                    $a->getId() === $character->getMovie_id() ? $selected = "selected" : $selected = "";
                    ?> <option <?= $selected ?> value="<?= $a->getId() ?>"><?= $a->getTitle() ?></option>
                <?php endforeach ?>
            </select>
            <div class="flex">
                <button type="submit" class="delete" name="deleteCharacter">Supprimer</button>
                <button type="submit" class="validate" name="updateCharacter">Valider</button>
            </div>
        </form>
    </div>
</main>
</body>
<?php include("partials/footer.php") ?>
</html>