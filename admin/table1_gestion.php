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
        <a class="btn" href="table1_new_form.php">Ajouter un film</a>
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
                require '../lib/db.inc.php';
                $query = $db->query('SELECT * FROM movies');
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
    </main>
</body>

</html>