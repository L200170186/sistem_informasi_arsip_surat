<?php

namespace App\Controllers;

class Suratmasuk extends BaseController
{

    public function index()
    {
        unset(
            $_SESSION['darisk'],
            $_SESSION['sampaisk']
        );
        $tgl_awal = $this->request->getVar('dari');
        $tgl_akhir = $this->request->getVar('sampai');
        $berdasarkan = $this->request->getVar('berdasarkan');

        if (isset($_GET['reset'])) {
            unset(
                $_SESSION['darism'],
                $_SESSION['sampaism'],
                $_SESSION['berdasarkansm']
            );
            $surat_masuk = $this->masukModel->suratmasuk();
        } else if ($tgl_awal && $tgl_awal && $berdasarkan) {
            $surat_masuk = $this->masukModel->search($tgl_awal, $tgl_akhir, $berdasarkan)->getResultArray();
            session()->set([
                'darism' => $tgl_awal,
                'sampaism' => $tgl_akhir,
                'berdasarkansm' => $berdasarkan
            ]);
        } else if (session()->get('darism') && session()->get('sampaism') && session()->get('berdasarkansm')) {
            $surat_masuk = $this->masukModel->search(session()->get('darism'), session()->get('sampaism'), session()->get('berdasarkansm'))->getResultArray();
            $tgl_awal = session()->get('darism');
            $tgl_akhir = session()->get('sampaism');
            $berdasarkan = session()->get('berdasarkansm');
        } else {
            $surat_masuk = $this->masukModel->suratmasuk();
        }

        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'dari' => $tgl_awal,
            'sampai' => $tgl_akhir,
            'berdasarkan' => $berdasarkan,
            'surat_masuk' => $surat_masuk,
            'user' => $dataUser,
            'title' => 'Surat Masuk'
        ];

        return view('suratmasuk/index', $data);
    }

    public function create()
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'no_agenda' => $this->masukModel->no_urut(),
            'validation' => \Config\Services::validation(),
            'user' => $dataUser,
            'title' => 'Tambah Surat Masuk'
        ];

        return view('suratmasuk/create', $data);
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
            'tgl_terima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal harus diisi.',
                ]
            ],
            'no_smasuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor surat harus diisi.',
                ]
            ],
            'tgl_smasuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal surat harus diisi.',
                ]
            ],
            'asal_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'asal surat harus diisi.',
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
            return redirect()->to('suratmasuk/create')->withInput();
        }
        $no_agenda = $this->request->getVar('no_agenda');
        $tahun = date("Y", strtotime($this->request->getVar('tgl_terima')));
        $acak = rand(1000, 9999);
        $file = $this->request->getFile('file');
        if ($file->getError() == 4) {
            $namaFile = 'null';
        } else {
            $namaFile = 'SM_' . $no_agenda . '_' . $tahun . '_' . $acak . '.' . $file->getClientExtension();
            $file->move('pdf', $namaFile);
        }

        $data = [
            'surat_masuk' => $this->masukModel->findAll()
        ];
        unset(
            $_SESSION['darism'],
            $_SESSION['sampaism'],
            $_SESSION['berdasarkansm']
        );

        $this->masukModel->save([
            'no_agenda' => $this->request->getVar('no_agenda'),
            'tgl_terima' => $this->request->getVar('tgl_terima'),
            'no_smasuk' => $this->request->getVar('no_smasuk'),
            'tgl_smasuk' => $this->request->getVar('tgl_smasuk'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'isi_surat' => $this->request->getVar('isi_surat'),
            'retensi_aktif' => $this->request->getVar('retensi_aktif'),
            'pengolah' => $this->request->getVar('pengolah'),
            'file' => $namaFile
        ]);

        session()->setFlashdata('tambah', 'Data Berhasil Ditambahkan.');

        return redirect()->to('suratmasuk');
    }

    public function detail($id_suratmasuk)
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'suratmasuk' => $this->masukModel->getSuratmasuk($id_suratmasuk),
            'user' => $dataUser,
            'title' => 'Detail Surat Masuk'
        ];


        if (empty($data['suratmasuk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Surat masuk dengan id ' . $id_suratmasuk . ' tidak ditemukan.');
        }

        return view('suratmasuk/detail', $data);
    }

    public function edit($id_suratmasuk)
    {
        $users = $this->userModel;
        $dataUser = $users->where([
            'id_user' => session()->get('id_user'),
        ])->first();
        $data = [
            'validation' => \Config\Services::validation(),
            'suratmasuk' => $this->masukModel->getSuratmasuk($id_suratmasuk),
            'user' => $dataUser,
            'title' => 'Edit Surat Masuk'
        ];

        return view('suratmasuk/edit', $data);
    }

    public function update($id_suratmasuk)
    {
        if (!$this->validate([
            'no_agenda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor agenda harus diisi.',
                ]
            ],
            'no_smasuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nomor surat harus diisi.',
                ]
            ],
            'tgl_smasuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal surat harus diisi.',
                ]
            ],
            'asal_surat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'asal surat harus diisi.',
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
            return redirect()->to('suratmasuk/edit/' . $this->request->getVar('id_suratmasuk'))->withInput();
        }

        $fileFile = $this->request->getFile('file');
        $namalama = $this->request->getVar('fileLama');
        $no_agenda = $this->request->getVar('no_agenda');
        $tahun = date("Y", strtotime($this->request->getVar('tgl_terima')));
        $acak = rand(1000, 9999);
        if ($fileFile->getError() == 4) {
            $namaFile = $this->request->getVar('fileLama');
        } else {
            if ($namalama != 'null') {
                $namaFile = 'SM_' . $no_agenda . '_' . $tahun . '_' . $acak . '.' . $fileFile->getClientExtension();
                $fileFile->move('pdf', $namaFile);
                unlink('pdf/' . $this->request->getVar('fileLama'));
            } elseif ($namalama == 'null') {
                $namaFile = 'SM_' . $no_agenda . '_' . $tahun . '_' . $acak . '.' . $fileFile->getClientExtension();
                $fileFile->move('pdf', $namaFile);
            }
        }

        $data = [
            'no_agenda' => $this->request->getVar('no_agenda'),
            'tgl_terima' => $this->request->getVar('tgl_terima'),
            'no_smasuk' => $this->request->getVar('no_smasuk'),
            'tgl_smasuk' => $this->request->getVar('tgl_smasuk'),
            'asal_surat' => $this->request->getVar('asal_surat'),
            'isi_surat' => $this->request->getVar('isi_surat'),
            'retensi_aktif' => $this->request->getVar('retensi_aktif'),
            'pengolah' => $this->request->getVar('pengolah'),
            'file' => $namaFile
        ];


        $ubah = $this->masukModel->update_suratmasuk($data, $id_suratmasuk);


        if ($ubah) {
            session()->setFlashdata('ubah', 'Data Berhasil Diubah');
            return redirect()->to('/suratmasuk');
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id_suratmasuk');

        foreach ($id as $id_suratmasuk) {
            $hapus = $this->masukModel->delete_suratmasuk($id_suratmasuk);
        }

        if ($hapus) {
            session()->setFlashdata('hapus', 'Data Berhasil Dihapus');
            return redirect()->back();
        }
    }
}
