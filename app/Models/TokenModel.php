<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table = 'user_token';
    protected $allowedFields = ['id_user', 'email', 'token'];

    public function delete_token($email)
    {
        return $this->db->table($this->table)->delete(['email' => $email]);
    }
}
