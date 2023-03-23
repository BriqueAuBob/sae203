<?php
$currentLink = basename($_SERVER['PHP_SELF']);
?>
<button class="burger_icon">
    <img src="/images/menu.svg" alt="Open menu icon">
</button>
<aside>
    <a href="/">AlloCinoch</a>
    <nav id="menu">
        <ul>
            <li><a <?= $currentLink === 'admin.php' ? 'class="active"' : '' ?> href="./">Tableau de bord</a></li>
            <li><a <?= $currentLink === 'table1_gestion.php' ? 'class="active"' : '' ?> href="films">Films</a></li>
            <li><a <?= $currentLink === 'table2_gestion.php' ? 'class="active"' : '' ?> href="genres">Genres</a></li>
            <li><a <?= $currentLink === 'table3_gestion.php' ? 'class="active"' : '' ?> href="acteurs">Acteurs</a></li>
            <li><a class="back" href="/">Retour au site</a></li>
        </ul>
    </nav>
    <?php
    if (isset($_SERVER['PHP_AUTH_USER'])) {
        echo '<div class="user"><span>Connecté en tant que</span>' . $_SERVER['PHP_AUTH_USER'] . '</div>';
    }
    ?>
</aside>