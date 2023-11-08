<?php
if (!empty($_POST)) {
    if (isset($_POST['addGender'])) {
        $new = new Gender($_POST);
        if ($new->isValidGender()) {
            $new->saveGender();
            flash_in("success", "Le genre a été ajouté");
        }
        header('Location: genders.php');
        exit();
    }

    if (isset($_POST['addMovie'])) {
        $new = new Movie($_POST);
        if ($new->isValid()) {
            $new->save();
            flash_in("success", "Le film a été ajouté");
        }
        header('Location: index.php');
        exit();
    }

    if (isset($_POST["updateGender"])) {
        $_POST = array_map("trim", $_POST);
        $update = new Gender($_POST);
        if ($update->isValidGender()) {
            $update->saveGender();
            flash_in("success", "Le genre a été modifié");
        }
        header("Location: uniqueGender.php?id=" . $_GET["id"]);
        exit();
    }

    if (isset($_POST["updateMovie"])) {
        $_POST = array_map("trim", $_POST);
        $update = new Movie($_POST);
        if ($update->isValid()) {
            $update->save();
            flash_in("success", "Le film a été modifié");
        }
        header("Location: uniqueMovie.php?id=" . $_GET["id"]);
        exit();
    }

    if (isset($_POST["deleteMovie"])) {
        $deleteMovie = new Movie($_POST);
        $deleteCharacters = Character::allCondition($deleteMovie->getId());
        foreach ($deleteCharacters as $deleteCharacter) :
            $deleteCharacter->delete();
        endforeach;
            flash_in("success", "Le film a été supprimé");
        header("Location: index.php");
        exit();
    }

    if (isset($_POST["addCharacter"])) {
        $_POST = array_map("trim", $_POST);
        $new = new Character($_POST);
        if ($new->isValid()) {
            $new->save();
            flash_in("success", "Le personnage a été ajouté");
        }
        header("Location: uniqueMovie.php?id=" . $new->getMovie_id());
        exit();
    }

    if (isset($_POST["deleteGender"])) {
        $deleteGender = new Gender($_POST);
        $deleteMovies = Movie::allCondition($deleteGender->getId());
        foreach ($deleteMovies as $deleteMovie) :
            $deleteCharacters = Character::allCondition($deleteMovie->getId());
            foreach ($deleteCharacters as $deleteCharacter) :
                $deleteCharacter->delete();
            endforeach;
            $deleteMovie->delete();

        endforeach;
        if ($deleteGender->delete())
            flash_in("success", "Le genre a été supprimé");
        else
            flash_in("danger", "Le genre n'a pas été supprimé");
        header("Location: index.php");
        exit();
    }

    if (isset($_POST["updateCharacter"])) {
        $_POST = array_map("trim", $_POST);
        $update = new Character($_POST);
        if ($update->isValid()) {
            $update->save();
            flash_in("success", "Le personnage a été modifié");
        }
        header("Location: uniqueCharacter.php?id=" . $update->getId());
        exit();
    }

    if (isset($_POST["deleteCharacter"])) {
        $delete = new Character($_POST);
        if ($delete->delete())
            flash_in("success", "Le personnage a été supprimé");
        else
            flash_in("danger", "Le personnage n'a pas été supprimé");
        header("Location: index.php");
        exit();
    }
}