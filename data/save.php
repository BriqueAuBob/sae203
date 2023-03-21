<?php

$array = [];
$i = 1;
while ($i < 20) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?language=fr-FR&page={$i}&api_key=cfdd221dfd52bb80d1f91495361a0e23",
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
        $results = json_decode($response, true);
        if (isset($results['results'])) {
            $results = $results['results'];
        } else {
            var_dump($results);
            break;
        }
        foreach ($results as $movie) {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.themoviedb.org/3/movie/{$movie['id']}?language=fr-FR&api_key=cfdd221dfd52bb80d1f91495361a0e23",
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

            $movieInformations = json_decode($response, true);

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.themoviedb.org/3/movie/{$movie['id']}/credits?api_key=cfdd221dfd52bb80d1f91495361a0e23",
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

            $movieInformations['credits'] = array_filter(json_decode($response, true)['cast'], function ($cast) {
                return $cast['known_for_department'] === 'Acting';
            });

            array_push($array, $movieInformations);
        }
    }
    $i++;
}
file_put_contents('data.json', json_encode($array));
