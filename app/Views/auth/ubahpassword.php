<?= $this->extend('auth/template'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Ubah Password?</h1>
                                    <p class="mb-4"><b><?= session()->get('reset_email'); ?></b></br>
                                        Masukkan Password yang baru!</p>
                                </div>
                                <form class="user" action="/auth/changePassword" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('passwordbaru')) ? 'is-invalid' : ''; ?>" id="passwordbaru" name="passwordbaru" aria-describedby="emailHelp" placeholder="Masukkan Password Baru...">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('passwordbaru'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('passwordbaru2')) ? 'is-invalid' : ''; ?>" id="passwordbaru2" name="passwordbaru2" aria-describedby="emailHelp" placeholder="Masukkan Konfirmasi Password...">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('passwordbaru2'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?= $this->endSection(); ?>