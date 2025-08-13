<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <script>
    location.reload();
    return false;
</script> -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-3 text-gray-800">Daftar Surat Masuk</h1> -->
    <div class="mb-4">
        <div class="card border-left-info shadow h-100">
            <div class="card-body">
                <h5 class="font-weight-bold text-gray-900"></i>Filter Surat Masuk</h5>
                <form action="" method="GET" enctype="multipart/form-data" name="resetsuratmasuk">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Dari Tanggal:</label>
                            <input type="date" class="form-control" id="dari" name="dari" value="<?= $dari ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Sampai Tanggal:</label>
                            <input type="date" class="form-control" id="sampai" name="sampai" value="<?= $sampai ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Filter Berdasarkan:</label>
                            <select class="form-control" id="berdasarkan" name="berdasarkan" required>
                                <option value="" <?= $berdasarkan == '' ? 'selected' : "" ?>>Pilih Berdasarkan...</option>
                                <option value="tgl_terima" <?= $berdasarkan == 'tgl_terima' ? 'selected' : "" ?>>Tanggal Terima</option>
                                <option value="tgl_smasuk" <?= $berdasarkan == 'tgl_smasuk' ? 'selected' : "" ?>>Tanggal Surat</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-2">
                            <button type="submit" class="btn btn-success mt-4 mr-2">Filter</button>
                            <a href="/suratmasuk?reset" class="btn btn-secondary mt-4" name="reset">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (session()->getFlashdata('tambah')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('tambah'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('ubah')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('ubah'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('hapus'); ?>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <?= form_open('/suratmasuk/delete', ['name' => 'hapussuratmasuk'], ['method' => 'POST']) ?>
    <div class="card shadow mb-4">
        <!-- <div class="card-header py-3 bg-gradient-success"> -->
        <div class="card-header bg-gradient-dark">
            <div class="row">
                <div class="col">
                    <h5 class="m-0 font-weight-bold text-gray-100 mt-1"><i class="fas fa-envelope"></i> Daftar Surat Masuk
                        <!-- <button type="button" class="btn btn-secondary btn-sm ml-2" id="reset"><i class="fas fa-sync-alt"></i></button> -->
                    </h5>
                </div>
                <div class="col">
                    <button class="btn btn-danger btn-icon-split btn-sm" type="submit" name="archive" onclick="archiveFunction()" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus Surat Masuk</span>
                    </button>
                    <a href="/suratmasuk/create" class="btn btn-primary btn-icon-split mr-2 btn-sm" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Surat Masuk</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-xs text-gray-800 table-striped" id="tabel" width="100%" cellspacing="0">
                    <thead class="text-center table-primary">
                        <tr>
                            <th><input type="checkbox" id="centangSemua"></th>
                            <th>No.Agenda</th>
                            <th>Tgl.Terima</th>
                            <th>No.Surat
                                <hr>
                                Tgl.Surat
                            </th>
                            <th>Asal Surat</th>
                            <th>Isi Surat</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($surat_masuk as $sm) : ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="id_suratmasuk[]" class="centangSatu" value="<?= $sm['id_suratmasuk']; ?>"></td>
                                <td class="text-center"><?= sprintf("%03d", $sm['no_agenda']); ?></td>
                                <td><?= date('d-M-Y', strtotime($sm['tgl_terima'])); ?></td>
                                <td><?= $sm['no_smasuk']; ?>
                                    <hr>
                                    <?= date('d-M-Y', strtotime($sm['tgl_smasuk'])); ?>
                                </td>
                                <td><?= $sm['asal_surat']; ?></td>
                                <td><?= $sm['isi_surat']; ?></td>
                                <td>
                                    <?php if ($sm['file'] == 'null') : ?>
                                        <i style="color:red">'Belum ada file yang diupload'</i>
                                    <?php else : ?>
                                        <?= $sm['file']; ?>
                                    <?php endif; ?>
                                </td>
                                <td class=' center'>
                                    <div class="btn-group">
                                        <a href="/suratmasuk/detail/<?= $sm['id_suratmasuk']; ?>" class='btn btn-info btn-sm mr-2'><span class="fas fa-eye"></a>
                                        <a href="/suratmasuk/edit/<?= $sm['id_suratmasuk']; ?>" class='btn btn-warning btn-sm'><span class="fas fa-edit"></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>
<script>
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = document.forms["hapussuratmasuk"]; // storing the form
        let jmldata = $('.centangSatu:checked');

        if (jmldata.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Perhatian',
                text: 'Maaf tidak ada yang bisa dihapus, silahkan centang data yang ingin dihapus!'
            })
        } else {
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapus?',
                html: "Ada <b>" + jmldata.length + "</b> data surat masuk yang akan dihapus secara permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#808080',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                } else {
                    Swal.fire(
                        'Dibatalkan',
                        'Data surat masuk tidak jadi dihapus',
                        'error'
                    )
                    $('#centangSemua').prop('checked', false);
                    $('.centangSatu').prop('checked', false);
                }
            })
        }
    }
</script>
<?= $this->endSection(); ?>