<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloCinoch - Catalogue</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main class="container">
        <h1>Catalogue</h1>
        <section class="grid">
            <article class="card clickable image h-auto">
                <img src="https://www.themoviedb.org/t/p/w1280/ggFHVNu6YYI5L9pCfOacjizRGt.jpg" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>Breaking Bad</h1>
                        <p>Lorem eiusmod commodo minim adipisicing ex ut est veniam.</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">45 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #432818;">Drame</span>
                            <span class="genre" style="--tag-color: #3a86ff;">Policier</span>
                            <span class="genre" style="--tag-color: #ff0054;">Thriller</span>
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
            <article class="card clickable image h-auto">
                <img src="https://www.themoviedb.org/t/p/w1280/ggFHVNu6YYI5L9pCfOacjizRGt.jpg" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>Breaking Bad</h1>
                        <p>Lorem eiusmod commodo minim adipisicing ex ut est veniam.</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">45 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #432818;">Drame</span>
                            <span class="genre" style="--tag-color: #3a86ff;">Policier</span>
                            <span class="genre" style="--tag-color: #ff0054;">Thriller</span>
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
            <article class="card clickable image h-auto">
                <img src="https://www.themoviedb.org/t/p/w1280/ggFHVNu6YYI5L9pCfOacjizRGt.jpg" alt="Image de film">
                <div class="overlay minimal">
                    <div class="content">
                        <h1>Breaking Bad</h1>
                        <p>Lorem eiusmod commodo minim adipisicing ex ut est veniam.</p>
                        <span class="tag"><img src="/images/clock.svg" alt="Pictogramme horloge">45 min</span>
                        <div class="genres">
                            <span class="genre" style="--tag-color: #432818;">Drame</span>
                            <span class="genre" style="--tag-color: #3a86ff;">Policier</span>
                            <span class="genre" style="--tag-color: #ff0054;">Thriller</span>
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
        <div class="mt-24">
            <a href="index.php" class="btn black big"><img src="/images/arrow-back.svg" alt="Pictogramme flèche gauche">Retour</a>
        </div>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="/js/script.js"></script>
</body>

</html>