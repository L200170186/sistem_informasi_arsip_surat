<?php

namespace App\Models;

use CodeIgniter\Model;

class KeluarModel extends Model
{
    protected $table = 'surat_keluar';
    protected $allowedFields = ['no_agenda', 'no_skeluar', 'tgl_skeluar', 'tujuan_surat', 'isi_surat', 'retensi_aktif', 'pengolah', 'file'];

    public function no_agenda()
    {
        $builder = $this->db->table('surat_keluar');
        $builder->selectmax('no_agenda');
        $query = $builder->get();
        return $query;
    }

    public function no_urut()
    {
        $builder = $this->table('surat_keluar');
        // $builder->orderBy('id_suratkeluar', 'DESC');
        $builder->orderBy('tgl_skeluar DESC, no_agenda DESC, id_suratkeluar DESC');
        $builder->limit(1);
        $query = $builder->first();
        // $string = substr($builder['no_agenda'], 0, 1);
        if ($query == null) {
            return $query = "0";
        } else {
            return $query['no_agenda'];
        }
    }

    public function getSuratkeluar($id_suratkeluar)
    {
        return $this->table('suratkeluar')
            ->where(['id_suratkeluar' => $id_suratkeluar])
            ->first();
    }

    public function update_suratkeluar($data, $id_suratkeluar)
    {
        return $this->db->table($this->table)->update($data, ['id_suratkeluar' => $id_suratkeluar]);
    }

    public function delete_suratkeluar($id_suratkeluar)
    {
        $builder = $this->table('surat_keluar');
        $builder->select('file');
        $builder->where(['id_suratkeluar' => $id_suratkeluar]);
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            if ($row->file != 'null') {
                unlink('pdf/' . ($row->file));
            }
        }
        return $this->db->table($this->table)->delete(['id_suratkeluar' => $id_suratkeluar]);
    }

    public function count()
    {
        $builder = $this->db->table('surat_keluar');
        $builder->selectCount('id_suratkeluar');
        $query = $builder->get();
        return $query;
    }

    public function search($tgl_awal, $tgl_akhir)
    {
        return $this->table('surat_keluar')
            ->where('tgl_skeluar >=', $tgl_awal)
            ->where('tgl_skeluar <=', $tgl_akhir)
            // ->orderBy('id_suratkeluar', 'ASC')
            ->orderBy('tgl_skeluar ASC, no_agenda ASC, id_suratkeluar ASC')
            ->get();
    }

    public function suratkeluar()
    {
        return $this->table('surat_keluar')
            // ->orderBy('id_suratkeluar', 'DESC')
            ->orderBy('tgl_skeluar DESC, no_agenda DESC, id_suratkeluar DESC')
            ->get()->getResultArray();
    }

    public function grafik()
    {
        for ($i = 1; $i < 13; $i++) {
            $chart     = $this->select("COUNT(id_suratkeluar) AS jumlah")
                ->where("MONTH(tgl_skeluar) = '$i' AND YEAR(tgl_skeluar) = YEAR(NOW())")
                ->first();
            $jumlah[] = $chart['jumlah'];
        }

        return $jumlah;
    }

    public function count2()
    {
        $builder = $this->db->table('surat_keluar');
        $builder->select("COUNT(id_suratkeluar) AS id_suratkeluar")
            ->where("YEAR(tgl_skeluar) = YEAR(NOW())");
        $query = $builder->get();
        return $query;
    }
}
