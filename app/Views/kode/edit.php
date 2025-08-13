<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Ubah Kode Surat</h6>
        </div>
        <div class="card-body">
            <form action="/kode/update/<?= $kode['id_kode']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kode" value="<?= $kode['id_kode']; ?>">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kode Surat<subscript style="color:red">*</subscript></label>
                    <input type="text" class="form-control <?= ($validation->hasError('kode')) ? 'is-invalid' : ''; ?>" id="kode" name="kode" value="<?= (old('kode')) ? old('kode') : $kode['kode']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('kode'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama<subscript style="color:red">*</subscript></label>
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $kode['nama']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Ubah</button>
                <a href="/kode" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>