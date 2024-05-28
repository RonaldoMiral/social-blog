<?php
    session_start();
    require_once preg_replace("/src.*/", "config/config.php", __DIR__);
    // if (!isset($_SESSION['user_id'])) {
    //     header('Location: '.BASE_URL.'public/login');
    //     exit;
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../public/css/reset.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./../../public/css/home.css">
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <header class="head">
        <h1>BlogSocial</h1>

        <?php if(isset($_SESSION['user_id'])) {
            $icon = strtoupper(str_split($_SESSION['username'])[0]);
            echo "<div class='perfil'>{$icon}</div>";
        } else {
            echo "<a href=".BASE_URL."public/login".">Entrar</a>";
        }?>
    </header>

    <main>
        <ul>
            <?php
                foreach($data as $key => $value) {
                    echo "<li class='post' data-id={$value['id']}>";
                        echo "<strong>".$value['title']."</strong>";
                        echo "<p>".$value['content']."</p>";
                    echo "</li>";
                }
            ?>
        </ul>
    </main>

    <script>
        const posts = Array.from(document.querySelectorAll('.post'));

        posts.forEach(post => {
            post.addEventListener('click', () => {
                window.location = `${post.baseURI}posts/${post.dataset.id}`;
            });
        })

        console.log(posts);

    </script>

</body>
</html>