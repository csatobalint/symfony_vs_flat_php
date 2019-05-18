<?php

// model.php
function open_database_connection() {
    $link = new PDO("mysql:host=localhost;dbname=symfony_book_blog_db", 'root', 'dbadmin');
    return $link;
}

function close_database_connection(&$link) {
    $link = null;
}

function get_all_posts() {
    $link = open_database_connection();
    $result = $link->query('SELECT id, title FROM post');
    $posts = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    close_database_connection($link);
    return $posts;
}

function get_post_by_id($id)
{
    $link = open_database_connection();
    $query = 'SELECT created_at, title, body FROM post WHERE id=:id';
    $statement = $link->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    close_database_connection($link);
    return $row;
}