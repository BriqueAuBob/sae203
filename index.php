<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AlloCinoch est un site web qui vous permet de voir une liste de films et séries.">
    <title>AlloCinoch - Accueil</title>
    <link rel="stylesheet" href="/css/style.min.css">
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
                            <p>Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique. Pour subvenir aux besoins de Skyler, sa femme enceinte, et de Walt Junior, son fils handicapé, il est obligé de travailler doublement.</p>
                            <div class="genres">
                                <span class="genre" style="--tag-color: #432818;">Drame</span>
                                <span class="genre" style="--tag-color: #2A6ACF;">Policier</span>
                                <span class="genre" style="--tag-color: #0C881A;">Thriller</span>
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
                            <p>Sylvain Marot, super flic parisien et pilote d’exception, est muté contre son gré à la Police Municipale de Marseille.</p>
                            <div class="genres">
                                <span class="genre" style="--tag-color: #D60A4E;">Action</span>
                                <span class="genre" style="--tag-color: #2A6ACF;">Comédie policière</span>
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
                            <h1>2 Fast 2 Furious</h1>
                            <p>Brian O'Conner a signé sa plus belle action, mais aussi sa faute la plus grave, en laissant filer le chef du gang de voleurs de voitures qu'il avait mission d'infiltrer.</p>
                            <div class="genres">
                                <span class="genre" style="--tag-color: #D60A4E;">Action</span>
                                <span class="genre" style="--tag-color: #2A6ACF;">Policier</span>
                                <span class="genre" style="--tag-color: #0C881A;">Thriller</span>
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
    <script src=" /js/script.min.js"></script>
</body>

</html>