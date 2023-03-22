<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Administration</title>
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <?php
    include 'sidebar.php';
    require '../lib/db.inc.php';
    ?>

    <main>
        <?php
        $id = $_GET['id'];

        $query = $db->prepare('SELECT * FROM actors WHERE id = :id');
        $query->execute([
            'id' => $id
        ]);
        $actor = $query->fetch();

        if (!$actor) {
            echo '<h1>L\'acteur n\'existe pas.</h1>';
            exit;
        }

        $query = $db->prepare('DELETE FROM actors WHERE id = :id');
        $query->execute([
            'id' => $id
        ]);
        ?>

        <h1>L'acteur <?= $actor['first_name'] . ' ' . $actor['last_name'] ?> a bien été supprimé.</h1>
        <a class="btn" href="table3_gestion.php">Retour à la liste des acteurs</a>
    </main>
</body>

</html>