<?php
    require_once preg_replace("/src.*/", "config/config.php", __DIR__);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL."css/reset.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL."css/form-styles.css" ?>">
</head>
<body>
    <div class="container">
        <h1>Entrar</h1>
        <form action="<?php echo BASE_URL . "login" ?>" method="POST">
            <div class="form-group">
                <label for="nameId">Nome de Usuário</label>
                <input type="text" name="name" id="nameId">
            </div>

            <div class="form-group">
                <label for="passwordId">Palavra-passe</label>
                <input type="password" name="password" id="passwordId">
            </div>
    
            <button type="submit">Entrar</button>
        </form>

        <a href="<?php echo BASE_URL . 'register' ?>" >Criar Conta</a>
    </div>
</body>
</html>