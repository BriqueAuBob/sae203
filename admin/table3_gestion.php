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
    <link rel="stylesheet" href="/css/admin.min.css">
</head>

<body>
    <?php
    include 'sidebar.php';
    ?>

    <main>
        <h1>Acteurs</h1>
        <div class="space-between">
            <a class="btn" href="table3_new_form.php">Ajouter un acteur</a>
            <form id="search" class="search" action="table3_gestion.php" method="GET">
                <input type="hidden" name="page" value="1">
                <input type="search" placeholder="Rechercher" name="search" value="<?= $search ?>">
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Nationalité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = $db->prepare('SELECT * FROM actors  WHERE first_name LIKE :search OR last_name LIKE :search OR nationality LIKE :search ORDER BY id LIMIT :per_page OFFSET :page');
                $query->bindValue(':per_page', $per_page, PDO::PARAM_INT);
                $query->bindValue(':page', (isset($page) ? $page - 1 : 0) * $per_page, PDO::PARAM_INT);
                $query->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
                $query->execute();
                $actors = $query->fetchAll();

                foreach ($actors as $actor) {
                ?>
                    <tr>
                        <td><img src="/images/uploads/<?= $actor['picture'] ?>"></td>
                        <td><?= $actor['first_name'] . ' ' . $actor['last_name'] ?></td>
                        <td><img src="https://cdn.jsdelivr.net/gh/hampusborgos/country-flags@main/svg/<?= $actor['nationality'] ?>.svg" alt="US"></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn" href="table3_update_form.php?id=<?= $actor['id'] ?>">Modifier</a>
                                <a class="btn red" href="table3_delete.php?id=<?= $actor['id'] ?>">Supprimer</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        displayPagination($page, $per_page, $search, 'actors', [
            'first_name',
            'last_name',
            'nationality'
        ]);
        ?>
    </main>
</body>

</html>