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
                                    <h1 class="h2 text-gray-900">Halaman Login!</h1>
                                    <p class="text-gray-900">Sistem Informasi Arsip Surat </br>
                                        SMP N 2 KARTASURA
                                    </p>
                                </div>
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('logout')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('logout'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('email')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('email'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('token')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('token'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('berhasil')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('berhasil'); ?>
                                    </div>
                                <?php endif; ?>
                                <form class="user" action="/auth/process" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="/auth/lupapassword">Lupa Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>