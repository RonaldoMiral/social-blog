<?php
namespace Source\Controllers;
// session_start();

use Core\View;
use Source\Models\CommentaryModel;
use Source\Models\PostModel;

class PostController
{
    private $post;

    public function __construct() {
        $this->post = new PostModel();
    }

    public function loadPosts() {
        return $this->post->loadAllPosts();
    }

    public function loadPostsByUserId($user_id) {
        return $this->post->loadPostsByUserId($user_id);
    }

    public function loadPostData() {
        $post_id = explode('/', $_GET['url'])[1];
        $post = $this->post->loadPostById($post_id)[0];

        $commentaries = new CommentaryModel();
        $post_commentaries = $commentaries->loadPostCommentaries($post_id);

        $data = [$post, $post_commentaries];
        View::render('post', $data);
    }

    public function createPost() {
        View::render('postForm');

        if($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_POST['poster'])) return;

        if(
            filter_input(INPUT_POST, 'title', FILTER_DEFAULT) === null ||
            filter_input(INPUT_POST, 'content', FILTER_DEFAULT) === null
        ) {
            echo "The requested fields are not defined";
            return;
        }

        $title = filter_input(INPUT_POST, 'title', FILTER_DEFAULT);
        $content = filter_input(INPUT_POST, 'content', FILTER_DEFAULT);
        $user_id = $_SESSION['user_id'];

        $result = $this->post->validatePostData($title, $content);
        if($result !== true) {
            echo $result;
            return;
        }

        $post_data = ['title' => $title, 'content' => $content, 'user_id' => $user_id];
        $created_post = $this->post->savePost($post_data);

        if(!$created_post) {
            "Post not created";
            return;
        } else {
            header('Location: ' . BASE_URL . "user/{$user_id}");
            exit();
        }
    }

}
