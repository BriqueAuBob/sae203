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

    $id = $_GET['id'];
    $query = $db->prepare('SELECT * FROM actors WHERE id = :id');
    $query->execute(['id' => $id]);
    $actor = $query->fetch();
    ?>

    <main>
        <h1>Ajouter un acteur</h1>
        <form method="POST" action="table3_update_valide.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div>
                <label for="first_name">Prénom</label>
                <input type="text" placeholder="John" name="first_name" id="first_name" value="<?= $actor['first_name'] ?>" required>
            </div>
            <div>
                <label for="last_name">Nom</label>
                <input placeholder="Doe" name="last_name" id="last_name" value="<?= $actor['last_name'] ?>">
            </div>
            <div>
                <label for="nationality">Nationalité</label>
                <input placeholder="us" name="nationality" id="nationality" value="<?= $actor['nationality'] ?>">
            </div>
            <div>
                <label for="picture">Photo</label>
                <input type="file" name="picture" id="picture">
                <img src="/images/uploads/<?= $actor['picture'] ?>" alt="Photo de l'acteur" id="thumbnail">
            </div>
            <div>
                <label for="movies">Films</label>
                <select name="movies[]" id="movies" multiple>
                    <?php
                    require '../lib/db.inc.php';
                    $query = $db->query('SELECT * FROM movies');
                    $movies = $query->fetchAll();

                    $select = $db->prepare('SELECT * FROM movies_actors WHERE acteur_id = :id');
                    $select->execute(['id' => $id]);
                    $selection = $select->fetchAll();
                    foreach ($movies as $movie) {
                        $selected = '';
                        foreach ($selection as $select) {
                            if ($select['film_id'] === $movie['id']) {
                                $selected = 'selected';
                            }
                        }
                    ?>
                        <option <?= $selected ?> value="<?= $movie['id'] ?>"><?= $movie['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <button class="btn green" type="submit">Modifier</button>
        </form>
    </main>

    <script>
        const picture = document.getElementById('picture');
        const thumbnail = document.getElementById('thumbnail');

        picture.addEventListener('change', () => {
            thumbnail.src = URL.createObjectURL(picture.files[0]);
        });
    </script>
</body>

</html>