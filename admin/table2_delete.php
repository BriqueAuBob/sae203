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
    ?>

    <main>
        <?php
        $id = $_GET['id'];

        $query = $db->prepare('SELECT * FROM genres WHERE id = :id');
        $query->execute([
            'id' => $id
        ]);
        $genre = $query->fetch();

        if (!$genre) {
            echo '<h1>Le genre n\'existe pas.</h1>';
            exit;
        }

        $query = $db->prepare('DELETE FROM genres WHERE id = :id');
        $query->execute([
            'id' => $id
        ]);
        ?>

        <h1>Le genre <?= $genre['name'] ?> a bien été supprimé.</h1>
        <a class="btn" href="table2_gestion.php">Retour à la liste des genres</a>
    </main>
</body>

</html>