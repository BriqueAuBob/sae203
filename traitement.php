<?php
if ((empty($_POST['prenom'])) || (empty($_POST['age']))) {
    header('Location: form2.php');
}
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$age_verif = filter_var($age, FILTER_VALIDATE_INT);
if ($age_verif == null) {
    echo "champ age non valide";
    header('Location: formulaire.php?erreur_age=Le champs age n\'est pas valide');
    exit;
}

$prenom_nettoye = filter_var($prenom, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
// if ($prenom_nettoye == null) {
//     echo "champ prenom non valide";
//     header('Location: formulaire.php?erreur_prenom=Le champs prenom n\'est pas valide');
//     exit;
// }
?>
<html>

<body>
    <h1> reponse </h1>
    <?php
    echo '<p>Votre prénom : ' . $prenom_nettoye . '</p>' . "\n";
    echo '<p>Votre âge : ' . $age . '</p>' . "\n";
    ?>
</body>

</html>