<?php
    $post = $data[0];
    $post_commentaries = $data[1];
    $url = $_GET['url'];
    $isLoggedIn = isset($_SESSION['user_id']) ? true : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_URL."css/reset.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL."css/post.css" ?>">
</head>
<body>
    <?php require_once BASE_PATH . '/src/views/header.php'?>
    <main>
        <div class="post">
            <h1><?php echo $post["title"] ?></h1>
            <p><?php echo $post["content"]; ?></p>
        </div>
        <fieldset class="commentaries">
            <legend>Comentários</legend>
            <ul class="commentaries-container">
                <?php
                    foreach($post_commentaries as $commentary) {
                        echo
                            "<li class='commentary'>
                                <div>
                                    De: <strong>{$commentary['username']}</strong>
                                </div>
                                <p>{$commentary['commentary']}</p>
                                <div class='commentary-actions'>
                                    <a href='' data-reply>Responder</a>
                                    <a href=". BASE_URL . $url . '/commentary/' . $commentary['id'] . '/delete-commentary' . ">Deletar</a>
                                </div>
                            </li>";
                    }
                ?>
            </ul>
        </fieldset>
        <form class="commentary-form"
            action = "<?php echo BASE_URL . 'posts/2/new-commentary' ?>"
            method="POST"
        >
            <textarea name="commentary-field"></textarea>
            <button>Enviar</button>
        </form>
    </main>
    <?php require_once BASE_PATH . '/src/views/footer.php'?>

    <script>
        const commentaryForm = document.querySelector('.commentary-form');
        commentaryForm.addEventListener('submit', (event) => {
            if(!"<?php echo $isLoggedIn ?>") {
                alert("Você deve iniciar sessão para comentar");
                event.preventDefault();
                return;
            }
        });


        const replyButton = document.querySelector('[data-reply]');
        replyButton.addEventListener('click', () => {
            
        })
    </script>
</body>
</html>