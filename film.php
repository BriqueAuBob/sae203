<?php
require('lib/db.inc.php');
require('lib/lib.inc.php');

$query = $db->prepare("SELECT 
            movies.id as id,
            movies.name as name, 
            movies.description as description, 
            movies.picture as picture,
            movies.duration as duration,
            movies.revenue as revenue,
            movies.budget as budget,
            movies.release_date as release_date,
            movies.trailer as trailer,
            GROUP_CONCAT(CONCAT(genres.name, ' (', genres.fg_color, '/', genres.bg_color, ')') SEPARATOR ', ') AS genres 
        FROM movies
        LEFT JOIN movies_genres ON movies.id = movies_genres.film_id 
        LEFT JOIN genres ON movies_genres.genre_id = genres.id
        WHERE movies.id = :id 
        GROUP BY movies.id
    ");
$query->execute([
    ':id' => $_GET['id'] ?? 0
]);
$movie = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AlloCinoch est un site web qui vous permet de voir une liste de films et séries.">
    <title>AlloCinoch - <?= $movie['name'] ?></title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main class="container" id="movie_layout">
        <?php
        if (!$movie) {
            echo '<h1 class="center mt-32">Le film n\'existe pas</h1>';
        } else {
        ?>
            <?php
            if (isset($movie['trailer'])) {
            ?>
                <div class="card image">
                    <iframe src="https://www.youtube.com/embed/<?= $movie['trailer'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            <?php
            }
            ?>
            <section class="mt-32">
                <h1><?= $movie['name'] ?></h1>
                <p><?= $movie['description'] ?></p>
                <div class="genres">
                    <?php
                    $genres = explode(', ', $movie['genres']);
                    foreach ($genres as $genre) {
                        generateGenreSpan($genre);
                    }
                    ?>
                </div>
            </section>
            <section class="casting mt-32">
                <h2>Casting</h2>
                <div class="grid">
                    <?php
                    $query = $db->prepare('SELECT * FROM actors LEFT JOIN movies_actors ON actors.id = movies_actors.acteur_id WHERE movies_actors.film_id = :id');
                    $query->execute([
                        ':id' => $movie['id']
                    ]);
                    $actors = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($actors as $actor) {
                        echo <<<HTML
                            <article class="card actor">
                                <img src="/images/uploads/{$actor['picture']}" alt="{$actor['first_name']} {$actor['last_name']}">
                                <h1>{$actor['first_name']} {$actor['last_name']}</h1>
                                <img src="https://cdn.jsdelivr.net/gh/hampusborgos/country-flags@main/svg/{$actor['nationality']}.svg" alt="US">
                            </article>
                        HTML;
                    }
                    ?>
                </div>
            </section>
        <?php
        }
        ?>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src=" /js/script.min.js"></script>
</body>

</html>