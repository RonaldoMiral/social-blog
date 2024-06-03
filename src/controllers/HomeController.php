<?php
namespace Source\Controllers;
require_once __DIR__.'/../../vendor/autoload.php';
use Core\View;
use Source\Models\PostModel;


class HomeController {
    public static function index() {
        $posts_instance = new PostModel();
        $posts = $posts_instance->loadAllPosts();

        View::render("home", $posts);
    }
}