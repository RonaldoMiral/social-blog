<?php

namespace Source\Models;

use Core\Model;

class CommentaryModel extends Model {

    private $table = "commentaries";

    public function loadPostCommentaries($post_id) {
        $fields = "commentaries.id, commentaries.commentary,
                   commentaries.post_id, commentaries.user_id,
                   users.username";
        $query = "SELECT {$fields} FROM {$this->table} JOIN users ON commentaries.user_id = users.id WHERE post_id = :post_id";
        $statement = $this->db->prepare($query);
        $statement->execute([':post_id' => $post_id]);

        return $statement->fetchAll();
    }

    public function saveCommentary($commentary_data) {
        extract($commentary_data);
        $query = "INSERT INTO {$this->table}(commentary, post_id, user_id) VALUES (:commentary, :post_id, :user_id)";
        $statement = $this->db->prepare($query);
        $args = [':commentary' => $commentary, ':post_id' => $post_id, ':user_id' => $user_id];
        return $statement->execute($args);
    }

    public function removeCommentary($dataset) {
        extract($dataset);
        $query = "DELETE FROM {$this->table} WHERE id = :id AND user_id = :user_id";
        $statement = $this->db->prepare($query);
        $args = [':id' => $commentary_id, ':user_id' => $user_id];
        return $statement->execute($args);
    }

}

