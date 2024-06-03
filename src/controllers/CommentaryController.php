<?php
namespace Source\Controllers;

use Core\View;
use Exception;
use Source\Models\CommentaryModel;

class CommentaryController {

    private $commentary;
    private $url;

    public function __construct()
    {
        $this->commentary = new CommentaryModel();
        $this->url = $_GET['url'];
    }

    public function createCommentary() {        
        if($_SERVER['REQUEST_METHOD'] !== "POST") return;
        
        if(filter_input(INPUT_POST, 'commentary-field', FILTER_DEFAULT) === null)
        {
            echo "The requested field is not defined";
            return;
        }

        $commentary = filter_input(INPUT_POST, 'commentary-field', FILTER_DEFAULT);

        if(empty($commentary)) {
            echo "Please fill in the field";
            return;
        }

        $post_id = explode('/', $this->url)[1];
        $user_id = $_SESSION['user_id'];
        $commentary_data = ['commentary' => $commentary, 'post_id' => $post_id, 'user_id' => $user_id];
        

        try {
            $saved = $this->commentary->saveCommentary($commentary_data);
            if(!$saved) {
                echo "Something went wrong while saving the commentary";
                return;
            }

            $back_url = str_replace('/new-commentary', '', $this->url);
            header('Location: ' . BASE_URL . $back_url);
        } catch (Exception $error) {
            echo "Error: " . $error->getMessage();
        }
    }

    public function deleteCommentary() {
        $commentary_id = explode('/', $this->url)[3];
        $user_id = $_SESSION['user_id'];
        $dataset = ['commentary_id' => $commentary_id, 'user_id' => $user_id];

        try {

            $this->commentary->removeCommentary($dataset);
            
            $back_url = str_replace("/commentary/{$commentary_id}/delete-commentary", "", $this->url);
            header('Location: ' . BASE_URL . $back_url);          
        } catch(Exception $error) {
            echo "Error: " . $error->getMessage();
        }
        
    }


}

