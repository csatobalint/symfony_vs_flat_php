<?php

// index.php
$link = new PDO("mysql:host=localhost;dbname=symfony_book_blog_db", 'root', 'dbadmin');
$result = $link->query('SELECT id, title FROM post');
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of Posts</title>
</head>

<body>
    <h1>List of Posts</h1>
    <ul>
        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <li>
            <a href="/show.php?id=<?= $row['id'] ?>">
                <?= $row['title'] ?>
            </a>
        </li>
        <?php endwhile ?>
    </ul>
</body>

</html>

<?php
$link = null;
?>