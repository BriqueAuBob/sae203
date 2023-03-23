<?php

function generateGenreSpan($genre)
{
    $genre = explode(' (', $genre);
    if (!isset($genre) || !isset($genre[0]) || !isset($genre[1])) return;
    $genre_name = $genre[0];
    $genre_colors = explode('/', $genre[1]);
    $genre_fg_color = $genre_colors[0];
    $genre_bg_color = substr($genre_colors[1], 0, -1);
    echo "<span class=\"genre\" style=\"--tag-color: #{$genre_bg_color}; color: #{$genre_fg_color};\">{$genre_name}</span>";
}

function transformToWebp($picture, $path)
{
    $jpeg = imagecreatefromstring($picture);
    $webp = imagecreatetruecolor(imagesx($jpeg), imagesy($jpeg));
    imagecopy($webp, $jpeg, 0, 0, 0, 0, imagesx($jpeg), imagesy($jpeg));
    imagewebp($webp, $path);
}

function paginationUrlBuilder($page, $search)
{
    return "?page=$page" . ($search !== '' ? "&search=$search" : '');
}

function displayPagination($page, $per_page, $search, $table, $fields)
{
    global $db;

    $fields = implode(' LIKE :search OR ', $fields) . ' LIKE :search';

    $count = $db->prepare("SELECT COUNT(*) FROM $table" . ($fields === ' LIKE :search' ? '' : " WHERE $fields"));
    if ($fields !== ' LIKE :search') {
        $count->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    }
    $count->execute();
    $count = $count->fetchColumn();
    $pages = ceil($count / $per_page);

    echo '<div class="pagination">';
    if ($page > 1) {
        echo '<a href="' . paginationUrlBuilder(1, $search) . '"><<</a>';
        echo '<a href="' . paginationUrlBuilder($page - 1, $search) . '"><</a>';
    }
    for ($i = max(1, $page - 5); $i <= min($pages, $page + 5); $i++) {
        $class = '';
        if ($page == $i) {
            $class = 'class="active"';
        }
        echo "<a $class href=\"" . paginationUrlBuilder($i, $search) . "\">$i</a>";
    }
    if ($page < $pages) {
        echo '<a href="' . paginationUrlBuilder($page + 1, $search) . '">></a>';
        echo '<a href="' . paginationUrlBuilder($pages, $search) . '">>></a>';
    }
    echo '</div>';
}

function convertMinutesToHours($minutes)
{
    $hours = floor($minutes / 60);
    $minutes = $minutes % 60;
    return $hours . 'h' . $minutes;
}
