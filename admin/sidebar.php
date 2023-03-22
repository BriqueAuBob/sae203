<?php
$currentLink = basename($_SERVER['PHP_SELF']);
?>
<aside>
    <a href="/">AlloCinoch</a>
    <nav id="menu">
        <ul>
            <li><a <?= $currentLink === 'admin.php' ? 'class="active"' : '' ?> href="admin.php">Tableau de bord</a></li>
            <li><a <?= $currentLink === 'table1_gestion.php' ? 'class="active"' : '' ?> href="table1_gestion.php">Films</a></li>
            <li><a <?= $currentLink === 'table2_gestion.php' ? 'class="active"' : '' ?> href="table2_gestion.php">Genres</a></li>
            <li><a <?= $currentLink === 'table3_gestion.php' ? 'class="active"' : '' ?> href="table3_gestion.php">Acteurs</a></li>
        </ul>
    </nav>
    <?php
    if (isset($_SERVER['PHP_AUTH_USER'])) {
        echo '<div class="user"><span>Connecté en tant que</span>' . $_SERVER['PHP_AUTH_USER'] . '</div>';
    }
    ?>
</aside>