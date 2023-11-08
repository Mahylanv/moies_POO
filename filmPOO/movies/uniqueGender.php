<?php
require("config/settings.php");
if (empty($_GET["id"])) {
    header("Location: index.php");
    exit();
}
$gender = new Gender($_GET["id"]);
if (empty($gender->getId())) {
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
    <h1><?= $gender->getName() ?></h1>
    <?php $all = Movie::allCondition($gender->getId());
    if (empty($all)) :

        ?>
        <p>Le genre n'a pas de film</p>
    <?php else : ?>

        <table class="table">
            <thead>
            <tr>
                <th>Nom du film</th>
                <th>IMDB</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($all as $a) :  ?>
                <tr onClick="document.location.href='uniqueMovie.php?id=<?= $a->getId() ?>'">
                    <td>
                        <a href="uniqueMovie.php?id=<?= $a->getId() ?>"><?= $a->getTitle() ?></a>
                    </td>
                    <td>
                        <a href="https://www.imdb.com/title/<?= $a->getImdb() ?>/?ref_=nm_knf_t_1"><?= $a->getImdb() ?></a>
                    </td>
                </tr>

            <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
    <button class="menu">Ajouter un film</button>
    <div class="texte">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <h1>Ajouter un film</h1>

            <p>
                <input type="hidden" name="gender_id" value="<?= $gender->getId() ?>">
            </p>

            <p>
                <input type="text" placeholder="Titre du film" name="title">
            </p>

            <p>
                <input type="text" placeholder="Numéro IMDB" name="imdb">
            </p>

            <button type="submit" class="validate" name="addMovie">Valider</button>

        </form>
    </div>
    <button class="menu">Modifier le genre</button>
    <div class="texte">
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            <h1>Modifier la catégorie</h1>
            <input type="hidden" name="id" value="<?= $gender->getId() ?>">
            <p>
                <input type="text" placeholder="Nom de la catégorie" name="name" value="<?= $gender->getName() ?>">
            </p>
            <div class="flex">
                <button type="submit" class="delete" name="deleteGender">Supprimer</button>
                <button type="submit" class="validate" name="updateGender">Valider</button>
            </div>
        </form>
    </div>
</main>

<?php include("partials/footer.php") ?>
</body>

</html>