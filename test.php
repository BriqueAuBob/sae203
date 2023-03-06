<?php

$db = new PDO('mysql:dbname=sae203Base;host=127.0.0.1', 'sae203User', 'X$_)=cKeKR3ve3-X7w28');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// same as above, but with a single query to avoid multiple loops and N+1 queries
$movies = $db->query("SELECT movies.id, movies.name as title, description, genres.name as genre_name, bg_color, fg_color  FROM movies
    LEFT JOIN movies_genres ON movies.id = movies_genres.film_id
    RIGHT JOIN genres ON movies_genres.genre_id = genres.id")->fetchAll(PDO::FETCH_ASSOC);

// output the movies
echo '<pre>' . var_export($movies, true) . '</pre>';
