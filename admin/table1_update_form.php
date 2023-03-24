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
    $query = $db->prepare('SELECT * FROM movies WHERE id = :id');
    $query->execute(['id' => $id]);
    $movie = $query->fetch();
    ?>

    <main>
        <h1>Modifier un film</h1>
        <form method="POST" action="table1_update_valide.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div>
                <label for="name">Nom du film</label>
                <input type="text" placeholder="Nom du film..." name="name" id="name" value="<?= $movie['name'] ?>" required>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea placeholder="Description du film..." name="description" id="description"><?= $movie['description'] ?></textarea>
            </div>
            <div>
                <label for="duration">Durée du film</label>
                <input type="number" placeholder="Durée du film... (en minutes)" name="duration" id="duration" value="<?= $movie['duration'] ?>">
            </div>
            <div>
                <label for=" budget">Budget</label>
                <input type="number" placeholder="Budget..." name="budget" id="budget" value="<?= $movie['budget'] ?>">
            </div>
            <div>
                <label for="benefices">Bénéfices</label>
                <input type="number" placeholder="Bénéfices..." name="benefices" id="benefices" value="<?= $movie['revenue'] ?>">
            </div>
            <div>
                <label for="teaser">Bande annonce (ID YouTube)</label>
                <input type="text" placeholder="Bande annonce..." name="teaser" id="teaser" value="<?= $movie['trailer'] ?>">
            </div>
            <div>
                <label for="release_date">Date de sortie</label>
                <input type="date" placeholder="Date de sortie..." name="release_date" id="release_date" value="<?= $movie['release_date'] ?>">
            </div>
            <div>
                <label for="picture">Image</label>
                <input type="file" placeholder="Image..." name="picture" id="picture">
                <img id="thumbnail" src="/images/uploads/<?= $movie['picture'] ?>" alt="Image du film">
            </div>
            <div>
                <label for="genres">Genres</label>
                <select name="genres[]" id="genres" multiple>
                    <?php
                    require '../lib/db.inc.php';
                    $query = $db->query('SELECT * FROM genres');
                    $genres = $query->fetchAll();

                    $select = $db->prepare('SELECT * FROM movies_genres WHERE film_id = :id');
                    $select->execute(['id' => $id]);
                    $selection = $select->fetchAll();

                    foreach ($genres as $genre) {
                        $selected = '';
                        foreach ($selection as $select) {
                            if ($select['genre_id'] == $genre['id']) {
                                $selected = 'selected';
                            }
                        }
                    ?>
                        <option <?= $selected ?> value="<?= $genre['id'] ?>"><?= $genre['name'] ?></option>
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


                    $select = $db->prepare('SELECT * FROM movies_actors WHERE film_id = :id');
                    $select->execute(['id' => $id]);
                    $selection = $select->fetchAll();
                    foreach ($actors as $actor) {
                        $selected = '';
                        foreach ($selection as $select) {
                            if ($select['acteur_id'] == $actor['id']) {
                                $selected = 'selected';
                            }
                        }
                    ?>
                        <option <?= $selected ?> value="<?= $actor['id'] ?>"><?= $actor['first_name'] . ' ' . $actor['last_name'] ?></option>
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
    <script src="/js/script.min.js"></script>
</body>

</html>