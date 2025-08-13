<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-5 text-gray-800">Detail Surat Masuk</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/suratmasuk" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Data Surat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">File Surat</a>
                </li>
            </ul>
            <div class="tab-content mt-4" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-borderles" id="dataTable" cellspacing="0">
                        <tr>
                            <td width='100px'>Nomor Agenda</td>
                            <td width='5px'>:</td>
                            <td><?= sprintf("%03d", $suratmasuk['no_agenda']); ?></td>
                        </tr>
                        <tr>
                            <td width='100px'>Tanggal Terima</td>
                            <td width='5px'>:</td>
                            <td><?= date('d-m-Y', strtotime($suratmasuk['tgl_terima'])); ?></td>
                        </tr>
                        <tr>
                            <td width='100px'>Nomor Surat</td>
                            <td width='5px'>:</td>
                            <td><?= $suratmasuk['no_smasuk']; ?></td>
                        </tr>
                        <tr>
                            <td width='100px'>Tanggal Surat</td>
                            <td width='5px'>:</td>
                            <td><?= date('d-m-Y', strtotime($suratmasuk['tgl_smasuk'])); ?></td>
                        </tr>
                        <tr>
                            <td width='100px'>Asal Surat</td>
                            <td width='5px'>:</td>
                            <td><?= $suratmasuk['asal_surat']; ?></td>
                        </tr>
                        <tr>
                            <td width='100px'>Isi Surat</td>
                            <td width='5px'>:</td>
                            <td><?= $suratmasuk['isi_surat']; ?></td>
                        </tr>
                        <tr>
                            <td width='100px'>Retensi Aktif</td>
                            <td width='5px'>:</td>
                            <td><?= $suratmasuk['retensi_aktif']; ?></td>
                        </tr>
                        <tr>
                            <td width='100px'>Pengolah/Penyimpan</td>
                            <td width='5px'>:</td>
                            <td><?= $suratmasuk['pengolah']; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade text-center" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
                    <?php if ($suratmasuk['file'] == 'null') : ?>
                        <div class="alert alert-warning" role="alert">
                            Belum ada file yang diupload!
                        </div>
                    <?php else : ?>
                        <iframe src="/pdf/<?= $suratmasuk['file']; ?>" width="800" height="600" style="border:2px solid black;"></iframe>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>