<?php
require('lib/db.inc.php');
require('lib/lib.inc.php');

$query = $db->prepare("SELECT 
        movies.id as id,
        movies.name as name, 
        movies.description as description, 
        movies.picture as picture,
        GROUP_CONCAT(CONCAT(genres.name, ' (', genres.fg_color, '/', genres.bg_color, ')') SEPARATOR ', ') AS genres
    FROM movies 
    LEFT JOIN movies_genres ON movies.id = movies_genres.film_id 
    LEFT JOIN genres ON movies_genres.genre_id = genres.id
    GROUP BY movies.id
    ORDER BY RAND() LIMIT 6
");
$query->execute();
$movies = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AlloCinoch est un site web qui vous permet de voir une liste de films et séries.">
    <title>AlloCinoch - Accueil</title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main id="main_index">
        <div class="carousel">
            <div class="carousel_inner">
                <?php
                foreach ($movies as $movie) {
                ?>
                    <article class="carousel_item card big image">
                        <img src="/images/uploads/<?= $movie['picture'] ?>" alt="Image de film">
                        <div class="overlay">
                            <div class="texts">
                                <h1><?= $movie['name'] ?></h1>
                                <?php
                                if ($movie['description'] !== '') {
                                ?>
                                    <p><?= strlen($movie['description']) > 300 ? strstr(wordwrap($movie['description'], 300), "\n", true) . '...' : $movie['description'] ?></p>
                                <?php
                                }
                                ?>
                                <div class="genres">
                                    <?php
                                    $genres = explode(', ', $movie['genres']);
                                    foreach ($genres as $genre) {
                                        generateGenreSpan($genre);
                                    }
                                    ?>
                                </div>
                            </div>
                            <a href="/film.php?id=<?= $movie['id'] ?>" class="btn square">
                                <img class="big" src="/images/eye.svg" alt="eye">
                            </a>
                        </div>
                    </article>
                <?php
                }
                ?>
            </div>
        </div>
        <article class="card">
            <h1>Films</h1>
            <p>Nous répertorions une grande quantité de films sur notre site Internet.</p>
            <a href="/listing.php" class="btn"><img src="/images/eye.svg" alt="Picto oeil"> Voir les films</a>
        </article>
        <article class="card">
            <h1>Rechercher un film</h1>
            <p>Vous pouvez rechercher un film via son nom.</p>
            <a href="/form_recherche.php" class="btn"><img src="/images/search.svg" alt="Picto loupe"> Rechercher</a>
        </article>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src=" /js/script.min.js"></script>
</body>

</html>