<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-4">
        <div class="card border-left-info shadow h-100">
            <div class="card-body">
                <h5 class="font-weight-bold text-gray-900"></i>Filter Surat Keluar</h5>
                <form action="" method="GET" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Dari Tanggal:</label>
                            <input type="date" class="form-control" id="dari" name="dari" value="<?= $dari ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Sampai Tanggal:</label>
                            <input type="date" class="form-control" id="sampai" name="sampai" value="<?= $sampai ?>" required>
                        </div>
                        <div class="col-md-3 mt-2">
                            <button type="submit" class="btn btn-success mt-4 mr-2">Filter</button>
                            <a href="/suratkeluar?reset" class="btn btn-secondary mt-4" name="reset">Reset</a>
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
    <?= form_open('/suratkeluar/delete', ['name' => 'hapussuratkeluar'], ['method' => 'POST']) ?>
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark">
            <div class="row">
                <div class="col">
                    <h5 class="m-0 font-weight-bold text-gray-100 mt-1"><i class="fas fa-paper-plane"></i> Daftar Surat Keluar
                        <!-- <button type="button" class="btn btn-secondary btn-sm ml-2" id="reset"><i class="fas fa-sync-alt"></i></button> -->
                    </h5>
                </div>
                <div class="col">
                    <button class="btn btn-danger btn-icon-split btn-sm" type="submit" name="archive" onclick="archiveFunction()" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus Surat Keluar</span>
                    </button>
                    <a href="/suratkeluar/create" class="btn btn-primary btn-icon-split mr-2 btn-sm" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Surat Keluar</span>
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
                            <th>Tgl.Surat</th>
                            <th>No.Surat</th>
                            <th>Tujuan Surat</th>
                            <th>Isi Surat</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($surat_keluar as $sk) : ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="id_suratkeluar[]" class="centangSatu" value="<?= $sk['id_suratkeluar']; ?>"></td>
                                <td class="text-center"><?= sprintf("%03d", $sk['no_agenda']); ?></td>
                                <td><?= date('d-M-Y', strtotime($sk['tgl_skeluar'])); ?></td>
                                <td><?= $sk['no_skeluar']; ?></td>
                                <td><?= $sk['tujuan_surat']; ?></td>
                                <td><?= $sk['isi_surat']; ?></td>
                                <td>
                                    <?php if ($sk['file'] == 'null') : ?>
                                        <i style="color:red">'Belum ada file yang diupload'</i>
                                    <?php else : ?>
                                        <?= $sk['file']; ?>
                                    <?php endif; ?>
                                </td>
                                <td class=' center'>
                                    <div class="btn-group">
                                        <a href="/suratkeluar/detail/<?= $sk['id_suratkeluar']; ?>" class='btn btn-info btn-sm mr-2'><span class="fas fa-eye"></a>
                                        <a href="/suratkeluar/edit/<?= $sk['id_suratkeluar']; ?>" class='btn btn-warning btn-sm'><span class="fas fa-edit"></a>
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
        var form = document.forms["hapussuratkeluar"]; // storing the form
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
                html: "Ada <b>" + jmldata.length + "</b> data surat keluar yang akan dihapus secara permanen",
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
                        'Data surat keluar tidak jadi dihapus',
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