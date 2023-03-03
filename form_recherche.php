<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Catalogue</title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main class="container">
        <section class="card">
            <h1>Rechercher un(e) film/série</h1>
            <form action="reponse_recherche.php">
                <div>
                    <label for="name">Nom du film</label>
                    <input type="search" name="name" id="name">
                </div>
                <div class="list list-end">
                    <a href="index.php">Retour</a>
                    <button type="submit" class="btn">Rechercher</button>
                </div>
            </form>
        </section>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="/js/script.min.js"></script>
</body>

</html>