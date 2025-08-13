<?php

namespace App\Controllers;

class Laporanmasuk extends BaseController
{
    public function index()
    {
        unset(
            $_SESSION['darism'],
            $_SESSION['sampaism'],
            $_SESSION['berdasarkansm'],
            $_SESSION['darisk'],
            $_SESSION['sampaisk']
        );
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'user' => $dataUser,
            'title' => 'Laporan Masuk',
            'validation' => \Config\Services::validation()
        ];

        return view('laporanmasuk/index', $data);
    }

    public function cetaksuratmasuk()
    {
        $tgl_awal = $this->request->getVar('dari');
        $tgl_akhir = $this->request->getVar('sampai');
        $berdasarkan = $this->request->getVar('berdasarkan');

        $surat_masuk = $this->masukModel->search($tgl_awal, $tgl_akhir, $berdasarkan)->getResultArray();
        $data = [
            'surat_masuk' => $surat_masuk,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir
        ];

        echo view('laporanmasuk/laporanmasuk', $data);
    }
}
