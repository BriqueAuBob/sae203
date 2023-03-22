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
        <form method="POST" action="table2_new_valide.php" enctype="multipart/form-data">
            <div>
                <label for="name">Nom du genre</label>
                <input type="text" placeholder="Nom du genre..." name="name" id="name" required>
            </div>
            <div>
                <label for="bg_color">Couleur de fond</label>
                <input type="color" placeholder="Couleur de fond..." name="bg_color" id="bg_color" required>
            </div>
            <div>
                <label for="fg_color">Couleur de texte</label>
                <input type="color" placeholder="Couleur de texte..." name="fg_color" id="fg_color" required>
            </div>
            <button class="btn green" type="submit">Ajouter</button>
        </form>
    </main>
</body>

</html>