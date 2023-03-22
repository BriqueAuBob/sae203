<?php

require '../lib/db.inc.php';

$query = $db->prepare('SELECT * FROM actors');
$query->execute();
$actors = $query->fetchAll();

foreach ($actors as $actor) {
    if (!file_exists('../images/uploads/' . $actor['picture'])) {
        echo $actor['picture'] . ' does not exist<br>';
        $query = $db->prepare('DELETE FROM actors WHERE id = :id');
        $query->bindValue(':id', $actor['id'], PDO::PARAM_INT);
        $query->execute();
    }
}
