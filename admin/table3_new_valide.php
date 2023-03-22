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

        if (!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_FILES['picture']) || !isset($_POST['movies'])) {
            echo '<p>Erreur : tous les champs ne sont pas remplis !</p>';
            die();
        }

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $picture = $_FILES['picture'];
        $nationality = $_POST['nationality'];
        $movies = $_POST['movies'];

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

        $query = $db->prepare('INSERT INTO actors(first_name, last_name, picture, nationality) VALUES (:first_name, :last_name, :picture, :nationality)');
        $query->bindValue(':first_name', $first_name);
        $query->bindValue(':last_name', $last_name);
        $query->bindValue(':picture', $imageName);
        $query->bindValue(':nationality', $nationality);
        $query->execute();

        $actorId = $db->lastInsertId();

        foreach ($movies as $movie) {
            $query = $db->prepare('INSERT INTO movies_actors(film_id, acteur_id) VALUES (:film_id, :acteur_id)');
            $query->bindValue(':film_id', $movie);
            $query->bindValue(':acteur_id', $actorId);
            $query->execute();
        }
        ?>

        <h1>L'acteur a bien été ajouté.</h1>
    </main>
</body>

</html>