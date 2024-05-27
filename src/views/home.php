<?php
    require_once preg_replace("/src.*/", "config/config.php", __DIR__);
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
    <header>
        <h1>BlogSocial</h1>
    </header>

    <main>
        <ul>
            <?php
                foreach($data as $key => $value) {
                    echo "<li>";
                        echo "<strong>".$value['title']."</strong>";
                        echo "<p>".$value['content']."</p>";
                    echo "</li>";
                }
            ?>
        </ul>
    </main>

    <!-- <a href="<?php echo BASE_URL . 'public/login';?>">Login</a> -->
</body>
</html>
