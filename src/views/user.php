<?php
    use Core\View;
    View::auth();
    $url = rtrim($_GET["url"], '/');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . "css/reset.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . "css/user.css" ?>">
</head>
<body>
    <?php require_once BASE_PATH . '/src/views/header.php'?>

    <main>
        <div class="actions-wrapper">
            <a href="<?php echo BASE_URL."{$url}/create-post" ?>">New Post</a>
            <a href="<?php echo BASE_URL."{$url}/log-out" ?>">Log out</a>
        </div>

        <ul class="recent-posts">
            <?php

                foreach($data as $post) {
                    echo "<li class='post'>
                        <h1 class='post-title'>{$post["title"]}</h1>
                        <p class='post-body'>{$post["content"]}<p>
                    </li>";
                }

            ?>
        </ul>
    </main>
</body>
</html>