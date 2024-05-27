<?php

require_once __DIR__.'/../../vendor/autoload.php';

use Core\View;
use Source\Models\PostModel;


class HomeController extends View {
    public function index() {
        $posts_instance = new PostModel();
        $posts = $posts_instance->loadAllPosts();


        $this->render("home", $posts);
    }
}