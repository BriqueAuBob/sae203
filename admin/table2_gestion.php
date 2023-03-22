<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Gestion des genres</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <?php
    include 'sidebar.php';
    ?>

    <main>
        <h1>Genres</h1>
        <a class="btn" href="table2_new_form.php">Ajouter un genre</a>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Couleur de fond</th>
                    <th>Couleur du texte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../lib/db.inc.php';
                $query = $db->query('SELECT * FROM genres');
                $genres = $query->fetchAll();
                foreach ($genres as $genre) {
                ?>
                    <tr>
                        <td><?= $genre['name'] ?></td>
                        <td>
                            <div class="flex">
                                <div class="circle" style="background: #<?= $genre['bg_color'] ?>"></div>#<?= $genre['bg_color'] ?>
                            </div>
                        </td>
                        <td>
                            <div class="flex">
                                <div class="circle" style="background: #<?= $genre['fg_color'] ?>"></div>#<?= $genre['fg_color'] ?>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a class="btn" href="table2_update_form.php?id=<?= $genre['id'] ?>">Modifier</a>
                                <a class="btn red" href="table2_delete.php?id=<?= $genre['id'] ?>">Supprimer</a>
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