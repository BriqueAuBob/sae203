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

    $query = $db->query("SELECT (SELECT COUNT(*) FROM movies) AS movies, (SELECT COUNT(*) FROM actors) AS actors, (SELECT COUNT(*) FROM genres) AS genres");
    $counts = $query->fetch(PDO::FETCH_ASSOC);
    ?>

    <main>
        <h1>Administration</h1>
        <div class="grid-3">
            <div class="card">
                <h1>Films</h1>
                <h2><?= $counts['movies'] ?> films</h2>
                <div class="btn-list">
                    <a class="btn" href="films">Voir les films</a>
                    <a class="btn" href="table1_new_form.php">Ajouter un film</a>
                </div>
            </div>
            <div class="card">
                <h1>Genres</h1>
                <h2><?= $counts['genres'] ?> genres</h2>
                <div class="btn-list">
                    <a class="btn" href="genres">Voir les genres</a>
                    <a class="btn" href="table1_new_form.php">Ajouter un genre</a>
                </div>
            </div>
            <div class="card">
                <h1>Acteurs</h1>
                <h2><?= $counts['actors'] ?> acteurs</h2>
                <div class="btn-list">
                    <a class="btn" href="acteurs">Voir les acteurs</a>
                    <a class="btn" href="table1_new_form.php">Ajouter un acteur</a>
                </div>
            </div>
        </div>
    </main>
    <script src="/js/script.min.js"></script>
</body>

</html>