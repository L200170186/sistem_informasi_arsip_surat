<?php

namespace App\Models;

use CodeIgniter\Model;

class KodeModel extends Model
{
    protected $table = 'kode_surat';
    protected $allowedFields = ['id_kode', 'kode', 'nama'];

    public function getKode($id_kode = false)
    {
        if ($id_kode == false) {
            return $this->findAll();
        }

        return $this->where(['id_kode' => $id_kode])->first();
    }

    public function delete_kode($id_kode)
    {
        return $this->db->table($this->table)->delete(['id_kode' => $id_kode]);
    }

    public function update_kode($data, $id_kode)
    {
        return $this->db->table($this->table)->update($data, ['id_kode' => $id_kode]);
    }
}
