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
    ?>

    <main>
        <h1>Ajouter un film</h1>
        <form method="POST" action="table1_new_valide.php" enctype="multipart/form-data">
            <div>
                <label for="name">Nom du film</label>
                <input type="text" placeholder="Nom du film..." name="name" id="name" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea placeholder="Description du film..." name="description" id="description"></textarea>
            </div>
            <div>
                <label for="duration">Durée du film</label>
                <input type="number" placeholder="Durée du film... (en minutes)" name="duration" id="duration">
            </div>
            <div>
                <label for="budget">Budget</label>
                <input type="number" placeholder="Budget..." name="budget" id="budget">
            </div>
            <div>
                <label for="benefices">Bénéfices</label>
                <input type="number" placeholder="Bénéfices..." name="benefices" id="benefices">
            </div>
            <div>
                <label for="teaser">Bande annonce (ID YouTube)</label>
                <input type="text" placeholder="Bande annonce..." name="teaser" id="teaser">
            </div>
            <div>
                <label for="release_date">Date de sortie</label>
                <input type="date" placeholder="Date de sortie..." name="release_date" id="release_date">
            </div>
            <div>
                <label for="picture">Image</label>
                <input type="file" placeholder="Image..." name="picture" id="picture">
            </div>
            <div>
                <label for="genres">Genres</label>
                <select name="genres[]" id="genres" multiple>
                    <?php
                    require '../lib/db.inc.php';
                    $query = $db->query('SELECT * FROM genres');
                    $genres = $query->fetchAll();
                    foreach ($genres as $genre) {
                    ?>
                        <option value="<?= $genre['id'] ?>"><?= $genre['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div>
                <label for="actors">Acteurs</label>
                <select name="actors[]" id="actors" multiple>
                    <?php
                    require '../lib/db.inc.php';
                    $query = $db->query('SELECT * FROM actors');
                    $actors = $query->fetchAll();
                    foreach ($actors as $actor) {
                    ?>
                        <option value="<?= $actor['id'] ?>"><?= $actor['first_name'] . ' ' . $actor['last_name'] ?></option>
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