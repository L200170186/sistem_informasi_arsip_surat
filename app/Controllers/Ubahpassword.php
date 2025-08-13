<?php

namespace App\Controllers;

class Ubahpassword extends BaseController
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
            'validation' => \Config\Services::validation(),
            'title' => 'Ubah Password'
        ];
        return view('profil/ubahpassword', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'passwordlama' => [
                'rules' => 'required|alpha_numeric',
                'errors' => [
                    'required' => 'password harus diisi.',
                    'alpha_numeric' => 'password tidak boleh menggunakan spasi atau simbol.',
                ]
            ],
            'passwordbaru' => [
                'rules' => 'required|alpha_numeric|min_length[5]|matches[passwordbaru2]',
                'errors' => [
                    'required' => 'password harus diisi.',
                    'alpha_numeric' => 'password tidak boleh menggunakan spasi atau simbol.',
                    'min_length' => 'password minimal terdiri dari 5 karakter.',
                    'matches' => 'password baru tidak sesuai.'
                ]
            ],
            'passwordbaru2' => [
                'rules' => 'required|alpha_numeric|min_length[5]|matches[passwordbaru]',
                'errors' => [
                    'required' => 'password harus diisi.',
                    'alpha_numeric' => 'password tidak boleh menggunakan spasi atau simbol.',
                    'min_length' => 'password minimal terdiri dari 5 karakter.',
                    'matches' => 'password baru tidak sesuai.'
                ]
            ]

        ])) {
            return redirect()->to('/ubahpassword')->withInput();
        }

        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();

        $passwordlama = $this->request->getVar('passwordlama');
        $passwordbaru = $this->request->getVar('passwordbaru');

        if (!password_verify($passwordlama, $dataUser['password'])) {
            session()->setFlashdata('psalah', 'Password lama yang dimasukkan salah.');
            return redirect()->to('/ubahpassword');
        } else {
            if ($passwordlama == $passwordbaru) {
                session()->setFlashdata('psalah2', 'Password lama yang dimasukkan tidak boleh sama dengan password baru.');
                return redirect()->to('/ubahpassword');
            } else {
                $password_hash = password_hash($passwordbaru, PASSWORD_DEFAULT);

                $data = [
                    'password' => $password_hash
                ];

                $id_user = session()->get('id_user');

                $ubah = $this->userModel->update_password($data, $id_user);

                if ($ubah) {
                    session()->setFlashdata('pubah', 'Password berhasil diubah.');
                    return redirect()->to('/ubahpassword');
                }
            }
        }
    }
}
