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
        <h1>Criar Conta</h1>
        <form action="<?php echo BASE_URL.'register';?>" method="post">
            <div class="form-group">
                <label for="nameId">Nome de Usuário</label>
                <input type="text" name="name" id="nameId">
            </div>
            <div class="form-group">
                <label for="emailId">E-mail</label>
                <input type="email" name="email" id="emailId">
            </div>
            <div class="form-group">
                <label for="passwordId">Palavra-passe</label>
                <input type="password" name="password" id="passwordId">
            </div>
            <div class="form-group">
                <label for="confirmPasswordId">Confirm Palavra-pase</label>
                <input type="password" name="confirmPassword" id="confirmPasswordId">
            </div>

            <button type="submit" name="sender">Submeter</button>
        </form>

        <a href="<?php echo BASE_URL.'login';?>">Entrar</a>
    </div>

    <script>
        // document.querySelector('button').addEventListener('click', event => {
        //     event.preventDefault();
        // })
    </script>
</body>

</html>