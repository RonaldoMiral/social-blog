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
    <link rel="stylesheet" href="./../../public/css/create-post.css">
    <link rel="stylesheet" href="./css/create-post.css">
</head>

<body>
    <form action="<?php echo BASE_URL.'public/create-post';?>" method="POST">
        <h1>New Post</h1>
        <div class="form-group">
            <label for="titleId">Título</label>
            <input type="text" name="title" id="titleId">
        </div>
        <div class="form-group">
            <label for="contentId">Conteúdo</label>
            <span class="textarea-wrapper">
                <textarea name="content" id="contentId"></textarea>
            </span>
        </div>

        <button type="submit">Criar</button>
    </form>
</body>

</html>