<?php
require_once preg_replace("/src.*/", "config/config.php", __DIR__);

use Core\View;
use Source\Models\PostModel;

class PostController extends View
{
    private $post;

    public function __construct() {
        $this->post = new PostModel();
    }
    
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


        $result = $this->post->validatePostData($title, $content);
        if($result !== true) {
            echo $result;
            return;
        }

        $post_data = ['title' => $title, 'content' => $content];
        if($this->post->savePost($post_data)) {
            header('Location: '.BASE_URL.'public/');
        } else {
            echo "Error creating the post";
        }
    }

    public function post() {
        $id = (int)str_replace('posts/', '',$_GET['url']);
        $post_data = $this->post->bringUser($id);
        $this->render("post", $post_data);
    }
}
