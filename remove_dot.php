<?php

set_time_limit(99999999999999);

echo 'ah';

require 'lib/db.inc.php';
echo 'b';

$images = glob(__DIR__ . "/images/uploads/*.*");
foreach ($images as $image) {
    if (is_dir($image)) {
        continue;
    }

    echo 'c';
    $image = str_replace(__DIR__ . '/images/uploads/', '', $image);
    // search  in the file name
    if (strpos($image, ':') !== false) {
        $newname = str_replace(':', '-', $image);
        rename(__DIR__ . '/images/uploads/' . $image, __DIR__ . '/images/uploads/' . $newname);
        $query = $db->prepare('UPDATE movies SET picture = :newname WHERE picture = :oldname');
        $query->execute(array(
            ':newname' => $newname,
            ':oldname' => $image
        ));
    }
}

echo 'test';
