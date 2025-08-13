<?php

namespace App\Controllers;

class Profil extends BaseController
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
            'title' => 'Profil Pengguna',
            'validation' => \Config\Services::validation(),
            'user' => $dataUser
        ];
        return view('profil/index', $data);
    }

    public function edit()
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();


        $data = [
            'title' => 'Edit Profil',
            'validation' => \Config\Services::validation(),
            'user' => $dataUser
        ];
        return view('profil/edit', $data);
    }

    public function update()
    {

        if (!$this->validate([
            'username' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'username harus diisi.',
                    'alpha_numeric' => 'username tidak boleh menggunakan spasi atau simbol.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'email harus diisi.'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama harus diisi.'
                ]
            ],
            'image' => [
                'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image, 2048]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                    'max_size' => 'Ukuran gambar terlalu besar'
                ]
            ]
        ])) {
            return redirect()->to('/profil/edit')->withInput();
        }

        $fileImage = $this->request->getFile('image');

        if ($fileImage->getError() == 4) {
            $namaImage = $this->request->getVar('imageLama');
        } else {
            $namaImage = $fileImage->getName();
            $fileImage->move('img', $namaImage);
            unlink('img/' . $this->request->getVar('imageLama'));
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'nama' => $this->request->getVar('nama'),
            'image' => $namaImage
        ];

        $id_user = session()->get('id_user');

        $ubah = $this->userModel->update_user($data, $id_user);


        if ($ubah) {
            session()->setFlashdata('ubah', 'Profil Berhasil Diubah');
            return redirect()->to('/profil');
        }
    }
}
