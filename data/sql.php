<?php

set_time_limit(99999999999999);

$db = new PDO('mysql:host=localhost;dbname=sae203Base', 'sae203User', 'X$_)=cKeKR3ve3-X7w28');

function downloadImage($url, $path, $callback, $fallback)
{
    $jpeg = file_get_contents($url);
    if (!$jpeg) {
        $fallback();
        return;
    }
    $jpeg = imagecreatefromstring($jpeg);
    $webp = imagecreatetruecolor(imagesx($jpeg), imagesy($jpeg));
    imagecopy($webp, $jpeg, 0, 0, 0, 0, imagesx($jpeg), imagesy($jpeg));
    imagewebp($webp, $path);
    $callback();
}

$data = json_decode(file_get_contents('data.json'), true);

$genres = [];
$movies = [];
foreach ($data as $movie) {
    $genres =  array_merge($genres, $movie['genres']);

    $path = strtolower(str_replace(' ', '_', $movie['title']) . '.webp');
    downloadImage('https://www.themoviedb.org/t/p/w440_and_h660_face' . $movie['poster_path'], 'movies/' . $path, function () use ($movie, $path) {
        $movies[] = [
            'name' => $movie['title'],
            'picture' => $path,
            'description' => $movie['overview'],
            'budget' => $movie['budget'],
            'revenue' => $movie['revenue'],
            'duration' => $movie['runtime'],
            'release_date' => $movie['release_date'],
        ];
        echo 'ok';
    }, function () {
        echo 'error image not found';
    });
}

$genres = array_unique(array_map(function ($a) {
    return $a['name'];
}, $genres));

$actors = [];
foreach ($data as $item) {
    $actors =  array_merge($actors, $item['credits']);
}

$actors = array_map(function ($a) {
    $split = explode(' ', $a['name']);
    return [
        'name' => $a['name'],
        'image' => $a['profile_path'],
        'first_name' => $split[0],
        'last_name' => isset($split[1]) ? $split[1] : null,
        'nationality' => 'us'
    ];
}, $actors);

foreach ($actors as $key => $actor) {
    // if (!isset($actor['image'])) {
    //     unset($actors[$key]);
    //     continue;
    // }
    $path = strtolower($actor['first_name'] . (isset($actor['last_name']) ? '_' . $actor['last_name'] : '') . '.webp');

    // downloadImage('https://image.tmdb.org/t/p/w276_and_h350_face' . $actor['image'],'images/' . $path, function() {
    $actors[$key]['image_new_path'] = $path;
    //     echo 'ok';
    // }, function() use ($actors, $key) {
    //     unset($actors[$key]);
    //     echo 'error image not found for ' . $actors[$key]['name'];
    // });
}

$data = [
    'movies' => $movies,
    'actors' => $actors,
    'genres' => $genres
];
file_put_contents('data_change.json', json_encode($data));

// $db->query('DELETE FROM `movies`');
// $db->query('DELETE FROM `actors`');
// $db->query('DELETE FROM `genres`');

// foreach ($data['movies'] as $movie) {
//     // $sql = "INSERT INTO `movies` (`name`, `picture`, `description`, `budget`, `revenue`, `duration`, `release_date`) VALUES ('" . $movie['name'] . "', '" . $movie['picture'] . "', '" . $movie['description'] . "', '" . $movie['budget'] . "', '" . $movie['revenue'] . "', '" . $movie['duration'] . "', '" . $movie['release_date'] . "');\r<br>";

//     if ($movie['release_date'] === '') {
//         $ac = '0000-00-00';
//     } else {
//         $ac = $movie['release_date'];
//     }
//     try {
//         $stmt = $db->prepare('INSERT INTO `movies` (`name`, `picture`, `description`, `budget`, `revenue`, `duration`, `release_date`) VALUES (:name, :picture, :description, :budget, :revenue, :duration, :release_date);');
//         $stmt->bindParam(':name', $movie['name']);
//         $stmt->bindParam(':picture', $movie['picture']);
//         $stmt->bindParam(':description', $movie['description']);
//         $stmt->bindParam(':budget', $movie['budget']);
//         $stmt->bindParam(':revenue', $movie['revenue']);
//         $stmt->bindParam(':duration', $movie['duration']);
//         $stmt->bindParam(':release_date', $ac);
//         $stmt->execute();
//     } catch (Exception $e) {
//         echo 'ok';
//     }
// }
// foreach ($data['actors'] as $actor) {
//     $us = 'us';
//     $stmt = $db->prepare('INSERT INTO `actors` (`first_name` ,`last_name` ,`picture` ,`nationality`) VALUES (:first_name, :last_name, :image, :nationality);');
//     $stmt->bindParam(':first_name', $actor['first_name']);
//     $stmt->bindParam(':last_name', $actor['last_name']);
//     $stmt->bindParam(':image', $actor['image_new_path']);
//     $stmt->bindParam(':nationality', $us);
//     $stmt->execute();
// }
// foreach ($data['genres'] as $genre) {
//     $fff = 'FFF';
//     $zero = '000';
//     $stmt = $db->prepare('INSERT INTO `genres` (`name`, `fg_color`, `bg_color`) VALUES (:name, :fg_color, :bg_color);');
//     $stmt->bindParam(':name', $genre);
//     $stmt->bindParam(':fg_color', $fff);
//     $stmt->bindParam(':bg_color', $zero);
//     $stmt->execute();
// }
