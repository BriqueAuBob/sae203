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
    ?>

    <main>
        <h1>Ajouter un acteur</h1>
        <form method="POST" action="table3_new_valide.php" enctype="multipart/form-data">
            <div>
                <label for="first_name">Prénom</label>
                <input type="text" placeholder="John" name="first_name" id="first_name" required>
            </div>
            <div>
                <label for="last_name">Nom</label>
                <input placeholder="Doe" name="last_name" id="last_name">
            </div>
            <div>
                <label for="nationality">Nationalité</label>
                <input placeholder="us" name="nationality" id="nationality">
            </div>
            <div>
                <label for="picture">Photo</label>
                <input type="file" name="picture" id="picture">
            </div>
            <div>
                <label for="movies">Films</label>
                <select name="movies[]" id="movies" multiple>
                    <?php
                    require '../lib/db.inc.php';
                    $query = $db->query('SELECT * FROM movies');
                    $movies = $query->fetchAll();
                    foreach ($movies as $movie) {
                    ?>
                        <option value="<?= $movie['id'] ?>"><?= $movie['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button class="btn green" type="submit">Ajouter</button>
        </form>
    </main>
</body>

</html>