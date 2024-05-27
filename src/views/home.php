<?php
    require_once preg_replace("/src.*/", "config/config.php", __DIR__);

    var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hommer</h1>

    <a href="<?php echo BASE_URL . 'public/login';?>">Login</a>
</body>
</html>
