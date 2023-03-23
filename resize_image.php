<?php

set_time_limit(999999999999);


$images = glob('images/uploads/*.webp', GLOB_BRACE);

foreach ($images as $image) {
    $image_name = basename($image, '.webp');

    list($width, $height) = getimagesize($image);
    $new_width = $width / 2;
    $new_height = $height / 2;

    $new_image = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefromwebp($image);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    imagepalettetotruecolor($new_image);
    imagewebp($new_image, 'images/uploads/' . $image_name . '.webp');

    echo $image_name . ' ' . $new_width . ' ' . $new_height . '<br>';
}
