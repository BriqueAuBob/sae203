<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Administration</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <?php
    include 'sidebar.php';
    require '../lib/db.inc.php';
    require '../lib/lib.inc.php';
    ?>

    <main>
        <?php

        if (!isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['duration']) || !isset($_POST['budget']) || !isset($_POST['benefices']) || !isset($_POST['teaser']) || !isset($_POST['release_date']) || !isset($_FILES['picture']) || !isset($_POST['genres']) || !isset($_POST['actors'])) {
            echo '<p>Erreur : tous les champs ne sont pas remplis !</p>';
            die();
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $budget = $_POST['budget'];
        $benefices = $_POST['benefices'];
        $teaser = $_POST['teaser'];
        $release_date = $_POST['release_date'];
        $picture = $_FILES['picture'];
        $genres = $_POST['genres'];
        $actors = $_POST['actors'];

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

        $query = $db->prepare('INSERT INTO movies(name, description, duration, budget, revenue, trailer, release_date, picture) VALUES (:name, :description, :duration, :budget, :benefices, :teaser, :release_date, :picture)');
        $query->bindValue(':name', $name);
        $query->bindValue(':description', $description);
        $query->bindValue(':duration', $duration);
        $query->bindValue(':budget', $budget);
        $query->bindValue(':benefices', $benefices);
        $query->bindValue(':teaser', $teaser);
        $query->bindValue(':release_date', $release_date);
        $query->bindValue(':picture', $imageName);
        $query->execute();

        $movieId = $db->lastInsertId();

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

        <h1>Le film a bien été ajouté.</h1>
    </main>
</body>

</html>