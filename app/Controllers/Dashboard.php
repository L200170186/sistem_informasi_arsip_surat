<?php

namespace App\Controllers;

class Dashboard extends BaseController
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
            'suratmasuk' => $this->masukModel->count()->getResultArray(),
            'suratmasuk2' => $this->masukModel->count2()->getResultArray(),
            'suratkeluar' => $this->keluarModel->count()->getResultArray(),
            'suratkeluar2' => $this->keluarModel->count2()->getResultArray(),
            'grafikmasuk' => $this->masukModel->grafik(),
            'grafikkeluar' => $this->keluarModel->grafik(),
            'user' => $dataUser,
            'title' => 'Dashboard'
        ];
        // dd($data);
        return view('/index', $data);
    }
}
