<?php

set_time_limit(9999999999);

require('lib/db.inc.php');

$data = json_decode(file_get_contents('data.json'), true);

foreach ($data as $movie) {
    $query = $db->prepare('SELECT * FROM movies WHERE name = :name');
    $query->execute([
        'name' => $movie['title']
    ]);
    $movieDb = $query->fetch();

    if (!$movieDb) {
        continue;
    }

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.themoviedb.org/3/movie/{$movie['id']}/videos?language=fr-FR&api_key=cfdd221dfd52bb80d1f91495361a0e23",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_POSTFIELDS => "",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $response = json_decode($response, true);
        $trailer = null;
        foreach ($response['results'] as $result) {
            if ($result['type'] === 'Trailer' && $result['site'] === 'YouTube') {
                $trailer = $result['key'];
                break;
            }
        }

        $query = $db->prepare('UPDATE movies SET trailer = :trailer WHERE id = :id');
        $query->execute([
            'trailer' => $trailer,
            'id' => $movieDb['id']
        ]);
    }
}
