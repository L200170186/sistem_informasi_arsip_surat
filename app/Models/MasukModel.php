<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukModel extends Model
{
    protected $table = 'surat_masuk';
    protected $allowedFields = ['no_agenda',  'tgl_terima', 'no_smasuk', 'tgl_smasuk', 'asal_surat', 'isi_surat', 'retensi_aktif', 'pengolah', 'file'];

    public function no_agenda()
    {
        $builder = $this->db->table('surat_masuk');
        $builder->selectmax('no_agenda');
        $query = $builder->get();
        return $query;
    }

    public function no_urut()
    {
        $builder = $this->table('surat_masuk');
        $builder->orderBy('id_suratmasuk', 'DESC');
        $builder->limit(1);
        $query = $builder->first();

        if ($query == null) {
            return $query = "0";
        } else {
            return $query['no_agenda'];
        }
    }

    public function getSuratmasuk($id_suratmasuk)
    {
        return $this->table('surat_masuk')
            ->where(['id_suratmasuk' => $id_suratmasuk])
            ->first();
    }

    public function update_suratmasuk($data, $id_suratmasuk)
    {
        return $this->db->table($this->table)->update($data, ['id_suratmasuk' => $id_suratmasuk]);
    }

    public function delete_suratmasuk($id_suratmasuk)
    {
        $builder = $this->db->table('surat_masuk');
        $builder->select('file');
        $builder->where(['id_suratmasuk' => $id_suratmasuk]);
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            if ($row->file != 'null') {
                unlink('pdf/' . ($row->file));
            }
        }

        return $this->db->table($this->table)->delete(['id_suratmasuk' => $id_suratmasuk]);
    }

    public function count()
    {
        $builder = $this->db->table('surat_masuk');
        $builder->selectCount('id_suratmasuk');
        $query = $builder->get();
        return $query;
    }

    public function search($tgl_awal, $tgl_akhir, $berdasarkan)
    {
        if ($berdasarkan == 'tgl_terima') {
            return $this->table('suratmasuk')
                ->where('tgl_terima >=', $tgl_awal)
                ->where('tgl_terima <=', $tgl_akhir)
                ->orderBy('id_suratmasuk', 'ASC')
                ->get();
        } elseif ($berdasarkan == 'tgl_smasuk') {
            return $this->table('suratmasuk')
                ->where('tgl_smasuk >=', $tgl_awal)
                ->where('tgl_smasuk <=', $tgl_akhir)
                ->orderBy('id_suratmasuk', 'ASC')
                ->get();
        }
    }

    public function suratmasuk()
    {
        return $this->table('surat_masuk')
            ->orderBy('id_suratmasuk', 'DESC')
            ->get()->getResultArray();
    }

    public function grafik()
    {
        for ($i = 1; $i < 13; $i++) {
            $chart     = $this->select("COUNT(id_suratmasuk) AS jumlah")
                ->where("MONTH(tgl_terima) = '$i' AND YEAR(tgl_terima) = YEAR(NOW())")
                ->first();
            $jumlah[] = $chart['jumlah'];
        }

        return $jumlah;
    }

    public function count2()
    {
        $builder = $this->db->table('surat_masuk');
        $builder->select("COUNT(id_suratmasuk) AS id_suratmasuk")
            ->where("YEAR(tgl_terima) = YEAR(NOW())");
        $query = $builder->get();
        return $query;
    }
}
