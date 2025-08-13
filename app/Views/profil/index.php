<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('ubah')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('ubah'); ?>
        </div>
    <?php endif; ?>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-gradient-dark">
                <h5 class="m-0 font-weight-bold text-gray-100"><i class="fas fa-user"></i> Profil Pengguna</h5>
            </div>
            <div class="card-body">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4 mt-4">
                            <img src="/img/<?= $user['image']; ?>" alt="..." style="width: 150px; height: 170px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-text"><strong>Nama Lengkap :</strong></h6>
                                <h6 class="card-text"><?= $user['nama']; ?></h6>
                                <h6 class="card-text"><strong>Username :</strong></h6>
                                <h6 class="card-text"><?= $user['username']; ?></h6>
                                <h6 class="card-text"><strong>Email :</strong></h6>
                                <h6 class="card-text"><?= $user['email']; ?></h6>
                                <a href="/profil/edit" class="btn btn-primary mt-2">Ubah Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>