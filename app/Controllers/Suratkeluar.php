<?php

namespace App\Controllers;

class Suratkeluar extends BaseController
{
    public function index()
    {
        unset(
            $_SESSION['darism'],
            $_SESSION['sampaism'],
            $_SESSION['berdasarkansm']
        );
        $tgl_awal = $this->request->getVar('dari');
        $tgl_akhir = $this->request->getVar('sampai');

        if (isset($_GET['reset'])) {
            unset(
                $_SESSION['darisk'],
                $_SESSION['sampaisk']
            );
            $surat_keluar = $this->keluarModel->suratkeluar();
        } else if ($tgl_awal && $tgl_awal) {
            $surat_keluar = $this->keluarModel->search($tgl_awal, $tgl_akhir)->getResultArray();
            session()->set([
                'darisk' => $tgl_awal,
                'sampaisk' => $tgl_akhir
            ]);
        } else if (session()->get('darisk') && session()->get('sampaisk')) {
            $surat_keluar = $this->keluarModel->search(session()->get('darisk'), session()->get('sampaisk'))->getResultArray();
            $tgl_awal = session()->get('darisk');
            $tgl_akhir = session()->get('sampaisk');
        } else {
            $surat_keluar = $this->keluarModel->suratkeluar();
        }

        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'dari' => $tgl_awal,
            'sampai' => $tgl_akhir,
            'surat_keluar' => $surat_keluar,
            'user' => $dataUser,
            'title' => 'Surat Keluar'
        ];

        return view('suratkeluar/index', $data);
    }

    public function detail($id_suratkeluar)
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'suratkeluar' => $this->keluarModel->getSuratkeluar($id_suratkeluar),
            'user' => $dataUser,
            'title' => 'Detail Surat Keluar'
        ];

        if (empty($data['suratkeluar'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Surat keluar dengan id ' . $id_suratkeluar . ' tidak ditemukan.');
        }

        return view('suratkeluar/detail', $data);
    }

    public function create()
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();

        $data = [
            'no_agenda' => $this->keluarModel->no_urut(),
            'validation' => \Config\Services::validation(),
            'user' => $dataUser,
            'title' => 'Tambah Surat Keluar'
        ];
        return view('suratkeluar/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'no_agenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor agenda harus diisi.',
                ]
            ],
            'tgl_skeluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal surat harus diisi.',
                ]
            ],
            'no_skeluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor surat harus diisi.',
                ]
            ],
            'isi_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi surat harus diisi.',
                ]
            ],
            'file' => [
                'rules' => 'max_size[file, 5120]|ext_in[file,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'Yang anda pilih bukan pdf'
                ]
            ]
        ])) {
            return redirect()->to('suratkeluar/create')->withInput();
        }
        $no_agenda = $this->request->getVar('no_agenda');
        $tahun = date("Y", strtotime($this->request->getVar('tgl_skeluar')));
        $acak = rand(1000, 9999);
        $file = $this->request->getFile('file');
        if ($file->getError() == 4) {
            $namaFile = 'null';
        } else {
            $namaFile = 'SK_' . $no_agenda . '_' . $tahun . '_' . $acak . '.' . $file->getClientExtension();
            $file->move('pdf', $namaFile);
        }

        unset(
            $_SESSION['darisk'],
            $_SESSION['sampaisk']
        );

        $this->keluarModel->save([
            'no_agenda' => $this->request->getVar('no_agenda'),
            'tgl_skeluar' => $this->request->getVar('tgl_skeluar'),
            'no_skeluar' => $this->request->getVar('no_skeluar'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'isi_surat' => $this->request->getVar('isi_surat'),
            'retensi_aktif' => $this->request->getVar('retensi_aktif'),
            'pengolah' => $this->request->getVar('pengolah'),
            'file' => $namaFile
        ]);

        session()->setFlashdata('tambah', 'Data Berhasil Ditambahkan.');

        return redirect()->to('suratkeluar');
    }

    public function edit($id_suratkeluar)
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'validation' => \Config\Services::validation(),
            'suratkeluar' => $this->keluarModel->getSuratkeluar($id_suratkeluar),
            'user' => $dataUser,
            'title' => 'Edit Surat Keluar'
        ];

        return view('suratkeluar/edit', $data);
    }

    public function update($id_suratkeluar)
    {
        if (!$this->validate([
            'no_agenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor agenda harus diisi.',
                ]
            ],
            'no_skeluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor surat harus diisi.',
                ]
            ],
            'tgl_skeluar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal surat harus diisi.',
                ]
            ],
            'isi_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'isi surat harus diisi.',
                ]
            ],
            'file' => [
                'rules' => 'max_size[file, 5120]|ext_in[file,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'Yang anda pilih bukan pdf'
                ]
            ]
        ])) {
            return redirect()->to('suratkeluar/edit/' . $this->request->getVar('id_suratkeluar'))->withInput();
        }

        $fileFile = $this->request->getFile('file');
        $namalama = $this->request->getVar('fileLama');
        $no_agenda = $this->request->getVar('no_agenda');
        $tahun = date("Y", strtotime($this->request->getVar('tgl_skeluar')));
        $acak = rand(1000, 9999);
        if ($fileFile->getError() == 4) {
            $namaFile = $this->request->getVar('fileLama');
        } else {
            if ($namalama != 'null') {
                $namaFile = 'SK_' . $no_agenda . '_' . $tahun . '_' . $acak . '.' . $fileFile->getClientExtension();
                $fileFile->move('pdf', $namaFile);
                unlink('pdf/' . $this->request->getVar('fileLama'));
            } elseif ($namalama == 'null') {
                $namaFile = 'SK_' . $no_agenda . '_' . $tahun . '_' . $acak . '.' . $fileFile->getClientExtension();
                $fileFile->move('pdf', $namaFile);
            }
        }

        $data = [
            'no_agenda' => $this->request->getVar('no_agenda'),
            'no_skeluar' => $this->request->getVar('no_skeluar'),
            'tgl_skeluar' => $this->request->getVar('tgl_skeluar'),
            'tujuan_surat' => $this->request->getVar('tujuan_surat'),
            'isi_surat' => $this->request->getVar('isi_surat'),
            'retensi_aktif' => $this->request->getVar('retensi_aktif'),
            'pengolah' => $this->request->getVar('pengolah'),
            'file' => $namaFile
        ];


        $ubah = $this->keluarModel->update_suratkeluar($data, $id_suratkeluar);


        if ($ubah) {
            session()->setFlashdata('ubah', 'Data Berhasil Diubah');
            return redirect()->to('/suratkeluar');
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id_suratkeluar');

        foreach ($id as $id_suratkeluar) {
            $hapus = $this->keluarModel->delete_suratkeluar($id_suratkeluar);
        }

        if ($hapus) {
            session()->setFlashdata('hapus', 'Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
