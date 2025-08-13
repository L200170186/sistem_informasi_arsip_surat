<?php

namespace App\Controllers;

class Kode extends BaseController
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
            'kode' => $this->kodeModel->findAll(),
            'user' => $dataUser,
            'title' => 'Kode Surat'
        ];

        return view('kode/index', $data);
    }

    public function create()
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'validation' => \Config\Services::validation(),
            'user' => $dataUser,
            'title' => 'Tambah Kode Surat'
        ];

        return view('kode/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'kode' => [
                'rules' => 'required|is_unique[kode_surat.kode]',
                'errors' => [
                    'required' => 'kode surat harus diisi.',
                    'is_unique' => 'kode surat sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('kode/create')->withInput();
        }

        $this->kodeModel->save([
            'kode' => $this->request->getVar('kode'),
            'nama' => $this->request->getVar('nama')
        ]);

        session()->setFlashdata('tambah', 'Data Berhasil Ditambahkan.');

        return redirect()->to('/kode');
    }

    public function edit($id_kode)
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'validation' => \Config\Services::validation(),
            'kode' => $this->kodeModel->getKode($id_kode),
            'user' => $dataUser,
            'title' => 'Edit Kode Surat'
        ];

        return view('kode/edit', $data);
    }

    public function update($id_kode)
    {
        $kodeLama = $this->kodeModel->getKode($this->request->getVar('id_kode'));
        if ($kodeLama['kode'] == $this->request->getVar('kode')) {
            $rule_kode = 'required';
        } else {
            $rule_kode = 'required|is_unique[kode_surat.kode]';
        }

        if (!$this->validate([
            'kode' => [
                'rules' => $rule_kode,
                'errors' => [
                    'required' => 'kode surat harus diisi.',
                    'is_unique' => 'kode surat sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/kode/edit/' . $this->request->getVar('id_kode'))->withInput();
        }

        $kode = $this->request->getPost('kode');
        $nama = $this->request->getPost('nama');

        $data = [
            'kode' => $kode,
            'nama' => $nama
        ];


        $ubah = $this->kodeModel->update_kode($data, $id_kode);


        if ($ubah) {
            session()->setFlashdata('ubah', 'Data Berhasil Diubah');
            return redirect()->to('/kode');
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id_kode');

        foreach ($id as $id_kode) {
            $hapus = $this->kodeModel->delete_kode($id_kode);
        }

        if ($hapus) {
            session()->setFlashdata('hapus', 'Data Berhasil Dihapus');
            return redirect()->to('/kode');
        }
    }
}
