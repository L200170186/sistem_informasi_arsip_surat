<?php

namespace App\Controllers;

class Laporankeluar extends BaseController
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
            'title' => 'Laporan Keluar'
        ];

        return view('laporankeluar/index', $data);
    }

    public function cetaksuratkeluar()
    {
        $tgl_awal = $this->request->getVar('dari');
        $tgl_akhir = $this->request->getVar('sampai');

        $surat_keluar = $this->keluarModel->search($tgl_awal, $tgl_akhir)->getResultArray();
        $data = [
            'surat_keluar' => $surat_keluar,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir
        ];

        echo view('laporankeluar/laporankeluar', $data);
    }
}
