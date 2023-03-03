<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="AlloCinoch est un site web qui vous permet de voir une liste de films et séries.">
    <title>AlloCinoch - Breaking Bad</title>
    <link rel="stylesheet" href="/css/style.min.css">
</head>

<body>
    <?php
    require('header.php');
    ?>

    <main class="container" id="movie_layout">
        <div class="card image">
            <iframe src="https://www.youtube.com/embed/VFLkMDEO-Xc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <section class="mt-32">
            <h1>Breaking Bad</h1>
            <p>Walter White, 50 ans, est professeur de chimie dans un lycée du Nouveau-Mexique. Pour subvenir aux besoins de Skyler, sa femme enceinte, et de Walt Junior, son fils handicapé, il est obligé de travailler doublement.</p>
            <div class="genres">
                <span class="genre" style="--tag-color: #fca311;">Action</span>
                <span class="genre" style="--tag-color: #3a86ff;">Policier</span>
                <span class="genre" style="--tag-color: #ff0054;">Thriller</span>
            </div>
        </section>
        <section class="casting mt-32">
            <h2>Casting</h2>
            <div class="grid">
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
                <div class="actor">
                    <img src="/images/bryan_cranston.webp" alt="Bryan Cranston">
                    <p>Bryan Cranston</p>
                </div>
            </div>
        </section>
    </main>

    <?php
    require('footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src=" /js/script.min.js"></script>
</body>

</html>