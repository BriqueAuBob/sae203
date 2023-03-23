<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Catalogue</title>
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <?php
    require('header.php');

    require('lib/db.inc.php');
    require('lib/lib.inc.php');

    $per_page = 50;

    $query = $db->prepare("SELECT 
        movies.id as id,
        movies.name as name, 
        movies.description as description, 
        movies.picture as picture,
        movies.duration as duration,
        movies.revenue as revenue,
        movies.budget as budget,
        movies.release_date as release_date,
        GROUP_CONCAT(CONCAT(genres.name, ' (', genres.fg_color, '/', genres.bg_color, ')') SEPARATOR ', ') AS genres FROM movies 
        LEFT JOIN movies_genres ON movies.id = movies_genres.film_id 
        LEFT JOIN genres ON movies_genres.genre_id = genres.id
        GROUP BY movies.id
        LIMIT :limit OFFSET :offset
    ");
    $query->bindValue(':offset', (($_GET['page'] ?? 1) - 1) * $per_page, PDO::PARAM_INT);
    $query->bindValue(':limit', $per_page, PDO::PARAM_INT);
    $query->execute();
    $movies = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <main class="container">
        <h1>Catalogue</h1>
        <section class="grid">
            <?php
            foreach ($movies as $movie) {
            ?>
                <article class="card clickable image h-auto">
                    <img src="/images/uploads/<?= $movie['picture'] ?>" alt="<?= $movie['name'] ?>">
                    <div class="overlay minimal">
                        <div class="content">
                            <h1><?= $movie['name'] ?></h1>
                            <p><?= strstr(wordwrap($movie['description'], 120), "\n", true) ?>...</p>
                            <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge"><?= convertMinutesToHours($movie['duration']) ?></span>
                            <div class="genres">
                                <?php
                                $genres = explode(', ', $movie['genres']);
                                foreach ($genres as $genre) {
                                    generateGenreSpan($genre);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="popup">
                        <div>
                            Date de sortie
                            <span class="tag"><?= $movie['release_date'] ?></span>
                        </div>
                        <div>
                            Budget
                            <?php
                            if ($movie['budget'] == 0) {
                                echo ' <span class="tag">Inconnu</span>';
                            } else {
                                echo '<span class="tag">$' . (new \NumberFormatter("fr-FR", \NumberFormatter::DECIMAL))->format($movie['budget']) . '</span>';
                            }
                            ?>
                        </div>
                        <div>
                            Bénéfices
                            <?php
                            if ($movie['revenue'] == 0) {
                                echo ' <span class="tag">Inconnu</span>';
                            } else {
                                echo '<span class="tag">$' . (new \NumberFormatter("fr-FR", \NumberFormatter::DECIMAL))->format($movie['revenue']) . '</span>';
                            }
                            ?>
                        </div>
                        <a href="/film.php?id=<?= $movie['id'] ?>" class="btn full"><img src="/images/eye.svg" alt="Pictogramme lecture">Voir plus</a>
                    </div>
                </article>
            <?php
            }
            ?>
        </section>
        <div class="mt-24 space-between">
            <a href="index.php" class="btn black big"><img src="/images/arrow-back.svg" alt="Pictogramme flèche gauche">Retour</a>
            <?php
            displayPagination($_GET['page'] ?? 1, $per_page, '', 'movies', []);
            ?>
        </div>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="/js/script.min.js"></script>
</body>

</html>