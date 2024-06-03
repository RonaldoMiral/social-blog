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

        public function loadPostById($post_id) {
            $query = "SELECT * FROM {$this->table} WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->execute([':id' => $post_id]);

            return $statement->fetchAll();
        }

        public function loadPostsByUserId($user_id) {
            $query = "SELECT * FROM {$this->table} WHERE user_id = :user_id";
            $statement = $this->db->prepare($query);
            $args = [':user_id' => $user_id];
            $statement->execute($args);
            
            return $statement->fetchAll();
        }

        public function savePost($user_data) {
            extract($user_data);
            $query = "INSERT INTO {$this->table}(title, content, user_id) VALUES (:title, :content, :user_id)";
            
            $statement = $this->db->prepare($query);
            $args = [':title' => $title, ':content' => $content, ':user_id' => $user_id];
            return $statement->execute($args);
        }

        // public function bringUser($id) {
        //     try {

        //         $query = "SELECT * FROM {$this->table} WHERE id = :id";
        //         $statement = $this->db->prepare($query);
        //         $statement->execute([':id' => $id]);
    
        //         return $statement->fetch(PDO::FETCH_ASSOC);
        //     } catch (PDOException $err) {
        //         echo "Error: " . $err->getMessage();
        //         return false;
        //     }
        // }
    
        public function validatePostData($title, $content) {
            if (empty($title) || empty($content)) {
                return "Please fill in all the fields";
            }
    
            return true;
        }
    }

?>