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
                                    <h1 class="h4 text-gray-900 mb-2">Lupa Password?</h1>
                                    <p class="mb-4">Masukkan username anda, link akan dikirim melalui email yang ada pada akun anda!</p>
                                </div>
                                <?php if (session()->getFlashdata('gagal')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('gagal'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('sukses')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('sukses'); ?>
                                    </div>
                                <?php endif; ?>
                                <form class="user" action="/auth/processubah" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan username...">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/auth">Kembali ke halaman login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?= $this->endSection(); ?>