<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Ubah Profil Pengguna</h6>
            </div>
            <div class="card-body">
                <form action="/profil/update" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                    <input type="hidden" name="imageLama" value="<?= $user['image']; ?>">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username<sup style="color:red">*</sup></label>
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (old('username')) ? old('username') : $user['username']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap<sup style="color:red">*</sup></label>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $user['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email<sup style="color:red">*</sup></label>
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (old('email')) ? old('email') : $user['email']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Upload Gambar Profil<sup style="color:red">*</sup></label>
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="/img/<?= $user['image']; ?>" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input <?= ($validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" value="<?= (old('image')) ? old('image') : $user['image']; ?>" onchange="ambilgambar()">
                                    <label class="custom-file-label" for="Image"><?= $user['image']; ?></label>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('image'); ?>
                                    </div>
                                </div>
                                <small>
                                    <subscript>*</subscript>Format file jpg, jpeg, png. Max 2 MB.
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class='btn btn-primary mr-2'>Ubah</button>
                        <a href="/profil" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>