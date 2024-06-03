<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo BASE_URL."css/reset.css" ?>">
    <link rel="stylesheet" href="<?php echo BASE_URL."css/home.css" ?>">
</head>

<body>
    <?php require_once BASE_PATH . '/src/views/header.php'?>

    <main>
        <ul class="home-posts-container">
            <?php
            foreach ($data as $key => $value) {
                echo "<li class='post' data-id={$value['id']}>";
                echo "<strong>" . $value['title'] . "</strong>";
                echo "<p>" . $value['content'] . "</p>";
                echo "</li>";
            }
            ?>
        </ul>
    </main>

    <?php require_once BASE_PATH . '/src/views/footer.php'?>
    <script>
        const posts = Array.from(document.querySelectorAll('.post'));
        const searchBar = document.querySelector('.search-bar');
        const clearSearchBar = document.querySelector('.clear-search-bar');

        searchBar.addEventListener('input', () => {
            searchBar.value === '' ?
                clearSearchBar.classList.add('hidden') :
                clearSearchBar.classList.remove('hidden');
            });
            
            clearSearchBar.addEventListener('click', () => {
                searchBar.value = '';
                clearSearchBar.classList.add('hidden');
            });
            
        if(posts.length !== 0) {
            posts.forEach(post => {
                post.addEventListener('click', () => {
                    window.location = `${post.baseURI}posts/${post.dataset.id}`;
                });
            });
        }
    </script>

</body>

</html>