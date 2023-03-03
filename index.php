<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AlloCinoch est un site web qui vous permet de voir une liste de films et séries.">
    <title>AlloCinoch - Accueil</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main id="main_index">
        <div class="carousel">
            <div class="carousel_inner">
                <article class="carousel_item card big image">
                    <img src="/images/breaking.webp" alt="Image de film">
                    <div class="overlay">
                        <div class="texts">
                            <h1>Breaking Bad</h1>
                            <p>Lorem Eiusmod proident consequat cillum nisi non non in nostrud deserunt cupidatat esse ullamco.</p>
                            <div class="genres">
                                <span class="genre" style="--tag-color: #432818;">Drame</span>
                                <span class="genre" style="--tag-color: #3a86ff;">Policier</span>
                                <span class="genre" style="--tag-color: #ff0054;">Thriller</span>
                                <span class="genre" style="--tag-color: #222222;">Comédie noire</span>
                            </div>
                        </div>
                        <a href="/film.php" class="btn square">
                            <img class="big" src="/images/eye.svg" alt="eye">
                        </a>
                    </div>
                </article>
                <article class="carousel_item card big image">
                    <img src="/images/taxi.webp" alt="Image de film">
                    <div class="overlay">
                        <div class="texts">
                            <h1>Taxi 5</h1>
                            <p>Lorem Eiusmod proident consequat cillum nisi non non in nostrud deserunt cupidatat esse ullamco.</p>
                            <div class="genres">
                                <span class="genre" style="--tag-color: #fca311;">Action</span>
                                <span class="genre" style="--tag-color: #3a86ff;">Comédie policière</span>
                            </div>
                        </div>
                        <a href="/film.php" class="btn square">
                            <img class="big" src="/images/eye.svg" alt="eye">
                        </a>
                    </div>
                </article>
                <article class="carousel_item card big image">
                    <img src="/images/fastfurious.webp" alt="Image de film">
                    <div class="overlay">
                        <div class="texts">
                            <h1>Fast & Furious 2</h1>
                            <p>Lorem Eiusmod proident consequat cillum nisi non non in nostrud deserunt cupidatat esse ullamco.</p>
                            <div class="genres">
                                <span class="genre" style="--tag-color: #fca311;">Action</span>
                                <span class="genre" style="--tag-color: #3a86ff;">Policier</span>
                                <span class="genre" style="--tag-color: #ff0054;">Thriller</span>
                            </div>
                        </div>
                        <a href="/film.php" class="btn square">
                            <img class="big" src="/images/eye.svg" alt="Eye">
                        </a>
                    </div>
                </article>
            </div>
        </div>
        <article class="card">
            <h1>Films</h1>
            <p>Nous répertorions une grande quantité de films sur notre site Internet.</p>
            <a href="/listing.php" class="btn"><img src="/images/eye.svg" alt="Picto oeil"> Voir les films</a>
        </article>
        <article class="card">
            <h1>Rechercher un film</h1>
            <p>Vous pouvez rechercher un film via son nom.</p>
            <a href="/form_recherche.php" class="btn"><img src="/images/search.svg" alt="Picto loupe"> Rechercher</a>
        </article>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src=" /js/script.js"></script>
</body>

</html>