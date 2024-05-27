<?php

    namespace Source\Models;
    use Core\Model;
    use PDO;

    class PostModel extends Model {
        private $table = 'posts';

        public function loadAllPosts () {
            $query = "SELECT * FROM {$this->table}";
            $statement = $this->db->prepare($query);
            $statement->execute();

            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function savePost($user_data) {
            extract($user_data);
            $query = "INSERT INTO {$this->table}(title, content) VALUES (:title, :content)";
            
            $statement = $this->db->prepare($query);
            $args = [':title' => $title, ':content' => $content];
            return $statement->execute($args);
        }
    
        public function validatePostData($title, $content) {
            if (empty($title) || empty($content)) {
                return "Please fill in all the fields";
            }
    
            return true;
        }
    }

?>