<?php
require_once preg_replace("/src.*/", "config/config.php", __DIR__);

use Core\View;
use Source\Models\PostModel;

class PostController extends View
{
    public function createPostForm()
    {
        $this->render("createPostForm");
    }

    public function createPost() {
        if (!isset($_POST['title']) || !isset($_POST['content'])) {
            echo "The resqueted fields are not defined";
            return;
        }

        $title = $_POST['title'];
        $content = $_POST['content'];

        $post = new PostModel();
        $result = $post->validatePostData($title, $content);
        if($result !== true) {
            echo $result;
            return;
        }

        $post_data = ['title' => $title, 'content' => $content];
        if($post->savePost($post_data)) {
            header('Location: '.BASE_URL.'public/');
        } else {
            echo "Error creating the post";
        }
    }
}
