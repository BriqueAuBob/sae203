<?php

set_time_limit(99999999999999);

echo 'ah';

require 'lib/db.inc.php';
echo 'b';

$images = glob(__DIR__ . "/images/uploads/*.*");
var_dump($images);
foreach ($images as $image) {
    if (is_dir($image)) {
        continue;
    }

    $image = str_replace('images/uploads/', '', $image);
    // search  in the file name
    if (strpos($image, ':') !== false) {
        $newname = str_replace(':', '-', $image);
        rename('images/uploads/' . $image, 'images/uploads/' . $newname);
        $query = $db->prepare('UPDATE movies SET picture = :newname WHERE picture = :oldname');
        $query->execute(array(
            ':newname' => $newname,
            ':oldname' => $image
        ));
    }
}

echo 'test';
