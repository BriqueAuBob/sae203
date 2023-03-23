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

function displayPagination($page, $per_page, $search, $table, $fields)
{
    global $db;

    $fields = implode(' LIKE :search OR ', $fields) . ' LIKE :search';

    $count = $db->prepare("SELECT COUNT(*) FROM $table WHERE $fields");
    $count->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    $count->execute();
    $count = $count->fetchColumn();
    $pages = ceil($count / $per_page);

    echo '<div class="pagination">';
    if ($page > 1) {
        echo '<a href="?page=1&search=' . $search . '"><<</a>';
        echo '<a href="?page=' . ($page - 1) . '&search=' . $search . '"><</a>';
    }
    for ($i = max(1, $page - 5); $i <= min($pages, $page + 5); $i++) {
        $class = '';
        if ($page == $i) {
            $class = 'class="active"';
        }
        echo "<a $class href=\"?page=$i&search=$search\">$i</a>";
    }
    if ($page < $pages) {
        echo '<a href="?page=' . ($page + 1) . '&search=' . $search . '">></a>';
        echo '<a href="?page=' . $pages . '&search=' . $search . '">>></a>';
    }
    echo '</div>';
}
