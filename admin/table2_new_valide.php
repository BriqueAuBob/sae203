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
    require '../lib/lib.inc.php';
    ?>

    <main>
        <?php

        if (!isset($_POST['name']) || !isset($_POST['fg_color']) || !isset($_POST['bg_color'])) {
            echo '<p>Erreur : tous les champs ne sont pas remplis !</p>';
            die();
        }

        $name = $_POST['name'];
        $bg_color = substr($_POST['bg_color'], 1, 6);
        $fg_color = substr($_POST['fg_color'], 1, 6);

        $query = $db->prepare('INSERT INTO genres(name, bg_color, fg_color) VALUES(:name, :bg_color, :fg_color)');
        $query->bindParam(':name', $name);
        $query->bindParam(':bg_color', $bg_color);
        $query->bindParam(':fg_color', $fg_color);
        $query->execute();
        ?>

        <h1>Le genre a bien été ajouté.</h1>
        <a class="btn" href="table2_gestion.php">Retour à la liste des genre</a>
    </main>
</body>

</html>