<?php
require '../lib/db.inc.php';
require '../lib/lib.inc.php';

$page = $_GET['page'] ?? 1;
$per_page = 25;

$search = $_GET['search'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Gestion des films</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <?php
    include 'sidebar.php';
    ?>

    <main>
        <h1>Films</h1>
        <div class="space-between">
            <a class="btn" href="table1_new_form.php">Ajouter un film</a>
            <form id="search" class="search" action="table1_gestion.php" method="GET">
                <input type="hidden" name="page" value="1">
                <input type="search" placeholder="Rechercher" name="search" value="<?= $search ?>">
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Date de sortie</th>
                    <th>Budget</th>
                    <th>Revenus</th>
                    <th>Durée</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $db->prepare('SELECT * FROM movies WHERE name LIKE :search OR description LIKE :search ORDER BY id LIMIT :per_page OFFSET :page');
                $query->bindValue(':per_page', $per_page, PDO::PARAM_INT);
                $query->bindValue(':page', (isset($page) ? $page - 1 : 0) * $per_page, PDO::PARAM_INT);
                $query->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                $query->execute();
                $movies = $query->fetchAll();
                foreach ($movies as $movie) {
                ?>
                    <tr>
                        <td><img src="/images/uploads/<?= $movie['picture'] ?>"></td>
                        <td><?= $movie['name'] ?></td>
                        <td><?= substr($movie['description'], 0, 70) ?></td>
                        <td><?= $movie['release_date'] ?></td>
                        <td><?= $movie['budget'] ?></td>
                        <td><?= $movie['revenue'] ?></td>
                        <td><?= $movie['duration'] ?>min</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn" href="table1_update_form.php?id=<?= $movie['id'] ?>">Modifier</a>
                                <a class="btn red" href="table1_delete.php?id=<?= $movie['id'] ?>">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        displayPagination($page, $per_page, $search, 'movies', [
            'name',
            'description'
        ]);
        ?>
    </main>

    <script src="/js/script.min.js"></script>
</body>

</html>