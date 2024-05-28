<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../public/css/reset.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./../../public/css/post.css">
    <link rel="stylesheet" href="./css/post.css">
</head>
<body>
    <div class="post">
        <h1><?php echo $data['title']; ?></h1>
        <p><?php echo $data['content']; ?></p>

        <div class="post-footer">
            <p>publicado em: <?php echo explode(' ', $data['created_at'])[0] ?>
        </div>
    </div>
</body>
</html>