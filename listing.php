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
    ");
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
                    <img src="/data/movies/<?= $movie['picture'] ?>" alt="<?= $movie['name'] ?>">
                    <div class="overlay minimal">
                        <div class="content">
                            <h1><?= $movie['name'] ?></h1>
                            <p><?= substr($movie['description'], 0, 120) ?></p>
                            <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge"><?= $movie['duration'] ?> min</span>
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
            <!-- <article class="card clickable image h-auto">
                <img src="/images/2fast2furious.webp" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>2 Fast 2 Furious</h1>
                        <p>Brian O'Conner a signé sa plus belle action, mais aussi sa faute la plus grave, en laissant filer le chef du gang de voleurs de voitures qu'il avait mission d'infiltrer.</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">107 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #D60A4E;">Action</span>
                            <span class="genre" style="--tag-color: #2A6ACF;">Policier</span>
                            <span class="genre" style="--tag-color: #0C881A;">Thriller</span>
                        </div>
                    </div>
                </div>
                <div class="popup">
                    <div>
                        Date de sortie
                        <span class="tag">20 janvier 2008</span>
                    </div>
                    <div>
                        Budget
                        <span class="tag">20M</span>
                    </div>
                    <div>
                        Bénéfices
                        <span class="tag">30M</span>
                    </div>
                    <a href="/film.php" class="btn full"><img src="/images/eye.svg" alt="Pictogramme lecture">Voir plus</a>
                </div>
            </article>
            <article class="card clickable image h-auto">
                <img src="/images/breaking_bad.webp" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>Breaking Bad</h1>
                        <p>Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique. Pour subvenir aux besoins de Skyler...</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">45 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #432818;">Drame</span>
                            <span class="genre" style="--tag-color: #2A6ACF;">Policier</span>
                            <span class="genre" style="--tag-color: #0C881A;">Thriller</span>
                            <span class="genre" style="--tag-color: #222222;">Comédie noire</span>
                        </div>
                    </div>
                </div>
                <div class="popup">
                    <div>
                        Date de sortie
                        <span class="tag">20 janvier 2008</span>
                    </div>
                    <div>
                        Budget
                        <span class="tag">20M</span>
                    </div>
                    <div>
                        Bénéfices
                        <span class="tag">30M</span>
                    </div>
                    <a href="/film.php" class="btn full"><img src="/images/eye.svg" alt="Pictogramme lecture">Voir plus</a>
                </div>
            </article> -->
        </section>
        <div class="mt-24">
            <a href="index.php" class="btn black big"><img src="/images/arrow-back.svg" alt="Pictogramme flèche gauche">Retour</a>
        </div>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="/js/script.min.js"></script>
</body>

</html>