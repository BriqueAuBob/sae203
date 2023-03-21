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
