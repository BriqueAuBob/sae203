<?php
$currentLink = basename($_SERVER['PHP_SELF']);
?>
<header>
    <a href="index.php">AlloCinoch</a>
    <button class="burger_icon">
        <img src="/images/menu.svg" alt="Open menu icon">
    </button>
    <nav id="menu">
        <div class="title">
            Navigation
            <button class="burger_icon">
                <img src=" /images/close.svg" alt="Close menu icon">
            </button>
        </div>
        <ul>
            <li><a <?= $currentLink === 'index.php' ? 'class="active"' : '' ?> href="index.php">Accueil</a></li>
            <li><a <?= $currentLink === 'listing.php' ? 'class="active"' : '' ?> href="listing.php">Catalogue</a></li>
            <li><a <?= $currentLink === 'form_recherche.php' ? 'class="active"' : '' ?> href="form_recherche.php">Rechercher</a></li>
            <li><a <?= $currentLink === 'admin.php' ? 'class="active"' : '' ?> href="admin.php">Administration</a></li>
        </ul>
    </nav>
</header>