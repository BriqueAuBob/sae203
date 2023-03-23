<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Administration</title>
    <link rel="stylesheet" href="/css/admin.min.css">
</head>

<body>
    <?php
    include 'sidebar.php';
    require '../lib/db.inc.php';
    require '../lib/lib.inc.php';
    ?>

    <main>
        <?php

        if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['duration']) || !isset($_POST['budget']) || !isset($_POST['benefices']) || !isset($_POST['teaser']) || !isset($_POST['release_date']) || !isset($_FILES['picture'])) {
            echo '<p>Erreur : tous les champs ne sont pas remplis !</p>';
            die();
        }

        $movieId = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $budget = $_POST['budget'];
        $benefices = $_POST['benefices'];
        $teaser = $_POST['teaser'];
        $release_date = $_POST['release_date'];
        $picture = $_FILES['picture'];
        $genres = $_POST['genres'] ?? [];
        $actors = $_POST['actors'] ?? [];

        if ($picture['name'] !== '') {
            $imageType = $picture["type"];
            if (($imageType != "image/png") &&
                ($imageType != "image/jpg") &&
                ($imageType != "image/jpeg")
            ) {
                echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
                echo 'Seuls les formats PNG et JPEG sont autorisés.</p>' . "\n";
                die();
            }
            $imageName = date("Y_m_d_H_i_s") . "-" . $picture["name"];
            $imageName = preg_replace('/\.[^.]*$/', '.webp', $imageName);

            transformToWebp(file_get_contents($picture['tmp_name']), '../images/uploads/' . $imageName);
        }

        $query = $db->prepare('UPDATE movies SET name = :name, description = :description, duration = :duration, budget = :budget, revenue = :benefices, trailer = :teaser, release_date = :release_date' . ($picture['name'] !== '' ? ', picture = :picture' : '') . ' WHERE id = :id');
        $query->bindValue(':name', $name);
        $query->bindValue(':description', $description);
        $query->bindValue(':duration', $duration);
        $query->bindValue(':budget', $budget);
        $query->bindValue(':benefices', $benefices);
        $query->bindValue(':teaser', $teaser);
        $query->bindValue(':release_date', $release_date);
        if ($picture['name'] !== '') {
            $query->bindValue(':picture', $imageName);
        }
        $query->bindValue(':id', $movieId);
        $query->execute();

        $query = $db->prepare('DELETE FROM movies_genres WHERE film_id = :film_id');
        $query->bindValue(':film_id', $movieId);
        $query->execute();

        $query = $db->prepare('DELETE FROM movies_actors WHERE film_id = :film_id');
        $query->bindValue(':film_id', $movieId);
        $query->execute();

        foreach ($genres as $genre) {
            $query = $db->prepare('INSERT INTO movies_genres(film_id, genre_id) VALUES (:film_id, :genre_id)');
            $query->bindValue(':film_id', $movieId);
            $query->bindValue(':genre_id', $genre);
            $query->execute();
        }

        foreach ($actors as $actor) {
            $query = $db->prepare('INSERT INTO movies_actors(film_id, acteur_id) VALUES (:film_id, :acteur_id)');
            $query->bindValue(':film_id', $movieId);
            $query->bindValue(':acteur_id', $actor);
            $query->execute();
        }
        ?>

        <h1>Le film <?= $name ?> a bien été modifié.</h1>
        <a class="btn" href="table1_gestion.php">Retour à la liste des films</a>
        <a class="btn" href="table1_update_form.php?id=<?= $movieId ?>">Modifier de nouveau</a>
    </main>
</body>

</html>