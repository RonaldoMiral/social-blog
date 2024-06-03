<?php 
    function isAuthenticated(): bool {
        return isset($_SESSION['user_id']) && ($_SESSION['username']);
    }
?>

<link rel="stylesheet" href="<?php echo BASE_URL."css/header.css" ?>">
<header>
    <h1 class="logo">SKS</h1>
    <div class="search-wrapper">
        <input type="text" name="" class="search-bar" id="">
        <img src="./imgs/icon-close.svg" class="clear-search-bar hidden" alt="">
    </div>
    <?php
        echo isAuthenticated() ? "<button class='me'>Eu</button>" :
        "<a href=".BASE_URL.'login'." class='login-link'>Entrar</a>"?>
</header>

<script>
    const me = document.querySelector('.me');
    console.log(me.baseURI);

    me.addEventListener('click', () => {
        const user_id = '<?php echo $_SESSION['user_id'] ?>';
        if(me.baseURI.includes(`user/${user_id}`)) return;
        window.location = `<?php echo BASE_URL ?>user/${user_id}`;
    })
</script>
