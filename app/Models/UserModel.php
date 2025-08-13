<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['id_user', 'nama', 'username', 'email', 'image', 'password'];

    public function update_user($data, $id_user)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $id_user]);
    }

    public function update_password($data, $id_user)
    {
        return $this->db->table($this->table)->update($data, ['id_user' => $id_user]);
    }

    public function reset_password($data, $email)
    {
        return $this->db->table($this->table)->update($data, ['email' => $email]);
    }
}
