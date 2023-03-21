<?php

require('../db.inc.php');

$json = file_get_contents('data.json');
$data = json_decode($json, true);

$moviesStmt = $db->query('SELECT * FROM movies');
$moviesDb = $moviesStmt->fetchAll(PDO::FETCH_ASSOC);
$genresStmt = $db->query('SELECT * FROM genres');
$genresDb = $genresStmt->fetchAll(PDO::FETCH_ASSOC);
$actors = $db->query('SELECT * FROM actors');
$actorsDb = $actors->fetchAll(PDO::FETCH_ASSOC);

$movieAssoc = [];
foreach ($data as $key => $movie) {
    $movieAssoc[$movie['title']] = $key;
}

$genreAssoc = [];
foreach ($genresDb as $key => $genre) {
    $genreAssoc[$genre['name']] = $genre['id'];
}

$actorAssoc = [];
foreach ($actorsDb as $key => $actor) {
    $actorAssoc[$actor['first_name'] . ' ' . $actor['last_name']] = $actor['id'];
}

// foreach ($moviesDb as $movieDb) {
//     $movie = $data[$movieAssoc[$movieDb['name']]];
//     $genres = $movie['genres'];
//     foreach ($genres as $genre) {
//         $genreId = $genreAssoc[$genre['name']];
//         echo $movie['id'] . ' ' . $genreId . '<br>';
//         $db->query('INSERT INTO movies_genres (film_id, genre_id) VALUES (' . $movieDb['id'] . ', ' . $genreId . ')');
//     }
// }


foreach ($moviesDb as $movieDb) {
    $movie = $data[$movieAssoc[$movieDb['name']]];
    $actors = $movie['credits'];
    foreach ($actors as $actor) {
        if (!isset($actorAssoc[$actor['name']])) continue;
        $actorId = $actorAssoc[$actor['name']];

        $result = $db->query('SELECT * FROM movies_actors WHERE film_id = ' . $movieDb['id'] . ' AND acteur_id = ' . $actorId . " LIMIT 1");
        if ($result->rowCount() > 0) continue;

        $db->query('INSERT INTO movies_actors (film_id, acteur_id) VALUES (' . $movieDb['id'] . ', ' . $actorId . ')');
    }
}
