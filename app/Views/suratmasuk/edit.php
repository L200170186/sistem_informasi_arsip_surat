<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Ubah Surat Masuk</h6>
        </div>
        <div class="card-body">
            <form action="/suratmasuk/update/<?= $suratmasuk['id_suratmasuk']; ?>" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <input type="hidden" name="id_suratmasuk" value="<?= $suratmasuk['id_suratmasuk']; ?>">
                    <input type="hidden" name="fileLama" value="<?= $suratmasuk['file']; ?>">
                    <div class="col-md-6 mt-2">
                        <label for="exampleInputPassword1" class="form-label">Nomor Agenda<sup style="color:red"> *</sup></label>
                        <input type="text" class="form-control <?= ($validation->hasError('no_agenda')) ? 'is-invalid' : ''; ?>" id="no_agenda" name="no_agenda" value="<?= (old('no_agenda')) ? old('no_agenda') : sprintf("%03d", $suratmasuk['no_agenda']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_agenda'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Tanggal Terima Surat<sup style="color:red"> *</sup></label>
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_terima')) ? 'is-invalid' : ''; ?>" id="tgl_terima" name="tgl_terima" value="<?= (old('tgl_terima')) ? old('tgl_terima') : $suratmasuk['tgl_terima']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_terima'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Nomor Surat<sup style="color:red"> *</sup></label>
                        <input type="text" class="form-control <?= ($validation->hasError('no_smasuk')) ? 'is-invalid' : ''; ?>" id="no_smasuk" name="no_smasuk" value="<?= (old('no_smasuk')) ? old('no_smasuk') : $suratmasuk['no_smasuk']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_smasuk'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Tanggal Surat<sup style="color:red"> *</sup></label>
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_smasuk')) ? 'is-invalid' : ''; ?>" id="tgl_smasuk" name="tgl_smasuk" value="<?= (old('tgl_smasuk')) ? old('tgl_smasuk') : $suratmasuk['tgl_smasuk']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_smasuk'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Asal Surat<sup style="color:red"> *</sup></label>
                        <input type="text" class="form-control <?= ($validation->hasError('asal_surat')) ? 'is-invalid' : ''; ?>" id="asal_surat" name="asal_surat" value="<?= (old('asal_surat')) ? old('asal_surat') : $suratmasuk['asal_surat']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('asal_surat'); ?>
                        </div>

                    </div>
                    <div class="col-md-6 mt-2">

                        <label for="exampleInputPassword1" class="form-label">Isi Surat<sup style="color:red"> *</sup></label>
                        <textarea class="form-control <?= ($validation->hasError('isi_surat')) ? 'is-invalid' : ''; ?>" id="isi_surat" name="isi_surat" rows="4"><?= (old('isi_surat')) ? old('isi_surat') : $suratmasuk['isi_surat']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('isi_surat'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Retensi Aktif<sup> (opsional)</sup></label>
                        <input type="text" class="form-control" id="retensi_aktif" name="retensi_aktif" value="<?= (old('retensi_aktif')) ? old('retensi_aktif') : $suratmasuk['retensi_aktif']; ?>">

                        <label for="exampleInputPassword1" class="form-label mt-3">Pengolah/Penyimpan<sup> (opsional)</sup></label>
                        <input type="text" class="form-control" id="pengolah" name="pengolah" value="<?= (old('pengolah')) ? old('pengolah') : $suratmasuk['pengolah']; ?>">

                        <label for="exampleInputPassword1" class="form-label mt-3">File Surat<sup> (opsional)</sup></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" name="file" value="<?= (old('file')) ? old('file') : $suratmasuk['file']; ?>" onchange="ambilnama()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('file'); ?>
                            </div>
                            <label class="custom-file-label" for="File"><?= $suratmasuk['file']; ?></label>
                            <small>
                                <subscript>*</subscript>Format file PDF. Max 5 MB.
                            </small>
                        </div>

                    </div>
                    <div class="col-md-6 mt-2">
                        <button type="submit" class="btn btn-primary mt-2 mr-2">Ubah</button>
                        <a href="/suratmasuk" class="btn btn-secondary mt-2">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>