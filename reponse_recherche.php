<?php
if (empty($_GET['name'])) {
    header('Location: form_recherche.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Catalogue</title>
    <meta name="description" content="Retrouvez la liste de films et séries sur cette page.">
    <link rel="stylesheet" href="/css/style.min.css">
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main class="container">
        <h1>Liste des films/séries dont le titre est "<?= htmlspecialchars($_GET['name']) ?>"</h1>
        <section class="grid">
            <article class="card clickable image h-auto">
                <img src="/images/taxi5.webp" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>Taxi 5</h1>
                        <p>Sylvain Marot, super flic parisien et pilote d’exception, est muté contre son gré à la Police Municipale de Marseille.</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">102 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #D60A4E;">Action</span>
                            <span class="genre" style="--tag-color: #2A6ACF;">Comédie policière</span>
                        </div>
                    </div>
                </div>
                <div class="popup">
                    <div>
                        Date de sortie
                        <span class="tag">20 janvier 2008</span>
                    </div>
                    <div>
                        Budget
                        <span class="tag">20M</span>
                    </div>
                    <div>
                        Bénéfices
                        <span class="tag">30M</span>
                    </div>
                    <a href="/film.php" class="btn full"><img src="/images/eye.svg" alt="Pictogramme lecture">Voir plus</a>
                </div>
            </article>
            <article class="card clickable image h-auto">
                <img src="/images/2fast2furious.webp" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>2 Fast 2 Furious</h1>
                        <p>Brian O'Conner a signé sa plus belle action, mais aussi sa faute la plus grave, en laissant filer le chef du gang de voleurs de voitures qu'il avait mission d'infiltrer.</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">107 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #D60A4E;">Action</span>
                            <span class="genre" style="--tag-color: #2A6ACF;">Policier</span>
                            <span class="genre" style="--tag-color: #0C881A;">Thriller</span>
                        </div>
                    </div>
                </div>
                <div class="popup">
                    <div>
                        Date de sortie
                        <span class="tag">20 janvier 2008</span>
                    </div>
                    <div>
                        Budget
                        <span class="tag">20M</span>
                    </div>
                    <div>
                        Bénéfices
                        <span class="tag">30M</span>
                    </div>
                    <a href="/film.php" class="btn full"><img src="/images/eye.svg" alt="Pictogramme lecture">Voir plus</a>
                </div>
            </article>
            <article class="card clickable image h-auto">
                <img src="/images/breaking_bad.webp" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>Breaking Bad</h1>
                        <p>Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique. Pour subvenir aux besoins de Skyler...</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">45 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #432818;">Drame</span>
                            <span class="genre" style="--tag-color: #2A6ACF;">Policier</span>
                            <span class="genre" style="--tag-color: #0C881A;">Thriller</span>
                            <span class="genre" style="--tag-color: #222222;">Comédie noire</span>
                        </div>
                    </div>
                </div>
                <div class="popup">
                    <div>
                        Date de sortie
                        <span class="tag">20 janvier 2008</span>
                    </div>
                    <div>
                        Budget
                        <span class="tag">20M</span>
                    </div>
                    <div>
                        Bénéfices
                        <span class="tag">30M</span>
                    </div>
                    <a href="/film.php" class="btn full"><img src="/images/eye.svg" alt="Pictogramme lecture">Voir plus</a>
                </div>
            </article>
        </section>
        <div class="btn-list mt-24">
            <a href="index.php" class="btn black big"><img class="big" src="/images/arrow-back.svg" alt="Pictogramme flèche gauche">Retour</a>
            <a href="form_recherche.php" class="btn black big"><img class="big" src="/images/search.svg" alt="Pictogramme loupe">Nouvelle recherche</a>
        </div>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="/js/script.min.js"></script>
</body>

</html>