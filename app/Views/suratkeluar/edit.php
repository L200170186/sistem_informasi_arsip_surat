<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Ubah Surat Keluar</h6>
        </div>
        <div class="card-body">
            <form action="/suratkeluar/update/<?= $suratkeluar['id_suratkeluar']; ?>" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <input type="hidden" name="id_suratkeluar" value="<?= $suratkeluar['id_suratkeluar']; ?>">
                    <input type="hidden" name="fileLama" value="<?= $suratkeluar['file']; ?>">
                    <div class="col-md-6 mt-2">
                        <label for="exampleInputPassword1" class="form-label">Nomor Agenda<sup style="color:red">*</sup></label>
                        <input type="text" class="form-control <?= ($validation->hasError('no_agenda')) ? 'is-invalid' : ''; ?>" id="no_agenda" name="no_agenda" value="<?= (old('no_agenda')) ? old('no_agenda') : sprintf("%03d", $suratkeluar['no_agenda']); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_agenda'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Tanggal Surat<sup style="color:red"> *</sup></label>
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_skeluar')) ? 'is-invalid' : ''; ?>" id="tgl_skeluar" name="tgl_skeluar" value="<?= (old('tgl_skeluar')) ? old('tgl_skeluar') : $suratkeluar['tgl_skeluar']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_skeluar'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Nomor Surat<sup style="color:red"> *</sup></label>
                        <input type="text" class="form-control <?= ($validation->hasError('no_skeluar')) ? 'is-invalid' : ''; ?>" id="no_skeluar" name="no_skeluar" value="<?= (old('no_skeluar')) ? old('no_skeluar') : $suratkeluar['no_skeluar']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('no_skeluar'); ?>
                        </div>


                        <label for="exampleInputPassword1" class="form-label mt-3">Tujuan Surat<sup> (opsional)</sup></label>
                        <input type="text" class="form-control" id="tujuan_surat" name="tujuan_surat" value="<?= (old('tujuan_surat')) ? old('tujuan_surat') : $suratkeluar['tujuan_surat']; ?>">
                    </div>

                    <div class="col-md-6 mt-2">
                        <label for="exampleInputPassword1" class="form-label">Isi Surat<sup style="color:red"> *</sup></label>
                        <textarea class="form-control <?= ($validation->hasError('isi_surat')) ? 'is-invalid' : ''; ?>" id="isi_surat" name="isi_surat" rows="4"><?= (old('isi_surat')) ? old('isi_surat') : $suratkeluar['isi_surat']; ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('isi_surat'); ?>
                        </div>

                        <label for="exampleInputPassword1" class="form-label mt-3">Retensi Aktif<sup> (opsional)</sup></label>
                        <input type="text" class="form-control" id="retensi_aktif" name="retensi_aktif" value="<?= (old('retensi_aktif')) ? old('retensi_aktif') : $suratkeluar['retensi_aktif']; ?>">

                        <label for="exampleInputPassword1" class="form-label mt-3">Pengolah/Penyimpan<sup> (opsional)</sup></label>
                        <input type="text" class="form-control" id="pengolah" name="pengolah" value="<?= (old('pengolah')) ? old('pengolah') : $suratkeluar['pengolah']; ?>">

                        <label for="exampleInputPassword1" class="form-label mt-3">File Surat<sup> (opsional)</sup></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('file')) ? 'is-invalid' : ''; ?>" id="file" name="file" value="<?= (old('file')) ? old('file') : $suratkeluar['file']; ?>" onchange="ambilnama()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('file'); ?>
                            </div>
                            <label class="custom-file-label" for="File"><?= $suratkeluar['file']; ?></label>
                            <small>
                                <subscript>*</subscript>Format file PDF. Max 5 MB.
                            </small>
                        </div>

                    </div>
                    <div class="col-md-6 mt-2">
                        <button type="submit" class="btn btn-primary mt-2 mr-2">Ubah</button>
                        <a href="/suratkeluar" class="btn btn-secondary mt-2">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>