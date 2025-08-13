<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('psalah')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('psalah'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('psalah2')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('psalah2'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pubah')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pubah'); ?>
        </div>
    <?php endif; ?>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Ubah Password</h6>
            </div>
            <div class="card-body">
                <form action="/ubahpassword/update" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Lama<sup style="color:red">*</sup></label>
                        <input type="password" class="form-control <?= ($validation->hasError('passwordlama')) ? 'is-invalid' : ''; ?>" id="passwordlama" name="passwordlama" value="<?= old('passwordlama'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('passwordlama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Baru<sup style="color:red">*</sup></label>
                        <input type="password" class="form-control <?= ($validation->hasError('passwordbaru')) ? 'is-invalid' : ''; ?>" id="passwordbaru" name="passwordbaru" value="<?= old('passwordbaru'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('passwordbaru'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Konfirmasi Password Baru<sup style="color:red">*</sup></label>
                        <input type="Password" class="form-control <?= ($validation->hasError('passwordbaru2')) ? 'is-invalid' : ''; ?>" id="passwordbaru2" name="passwordbaru2" value="<?= old('passwordbaru2'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('passwordbaru2'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-3">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>