<?php

namespace Core;
require_once preg_replace("/core.*/", "config/config.php", __DIR__);



class View
{
    public static function render($view, $data = null)
    {
        require_once BASE_PATH . '/src/views/' . $view . '.php';
    }

    public static function auth() {        
        if (!isset($_SESSION["user_id"]) && !isset($_SESSION["username"])) {
            header('Location: ' . BASE_URL . 'login');
            exit();
        }
    }
}
