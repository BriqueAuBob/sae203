<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
</head>

<body>
    <h1>Connexion</h1>
    <form method="post" action="traitement.php">
        <label for="prenom">Votre prénom : </label>
        <input type="text" name="prenom" id="prenom"><br />
        <?php
        if (isset($_GET['erreur_prenom'])) {
            echo '<p style="color:red;">' . $_GET['erreur_prenom'] . '</p>';
        }
        ?>
        <label for="age">Votre âge : </label>
        <input type="number" name="age" id="age"> ans.<br />
        <?php
        if (isset($_GET['erreur_age'])) {
            echo '<p style="color:red;">' . $_GET['erreur_age'] . '</p>';
        }
        ?>
        <input type="submit" value="Envoyer">
    </form>
</body>

</html>