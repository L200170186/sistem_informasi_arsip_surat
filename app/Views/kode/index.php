<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-3 text-gray-800">Daftar Kode Surat</h1> -->
    <?php if (session()->getFlashdata('tambah')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('tambah'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('hapus')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('hapus'); ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('ubah')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('ubah'); ?>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <?= form_open('/kode/delete', ['name' => 'hapuskode'], ['method' => 'POST']) ?>
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-dark">
            <div class="row">
                <div class="col">
                    <h5 class="m-0 font-weight-bold text-gray-100 mt-1"><i class="fas fa-database"></i> Daftar Kode Surat
                        <!-- <button type="button" class="btn btn-secondary btn-sm ml-2" id="reset"><i class="fas fa-sync-alt"></i></button> -->
                    </h5>
                </div>
                <div class="col">
                    <button class="btn btn-danger btn-icon-split btn-sm" type="submit" name="archive" onclick="archiveFunction()" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus Kode Surat</span>
                    </button>
                    <a href="/kode/create" class="btn btn-primary btn-icon-split mr-2 btn-sm" style="float: right;">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Kode Surat</span>
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
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kode as $k) : ?>
                            <tr>
                                <td class="text-center"><input type="checkbox" name="id_kode[]" class="centangSatu" value="<?= $k['id_kode']; ?>"></td>
                                <td><?= $i++; ?></td>
                                <td><?= $k['kode']; ?></td>
                                <td><?= $k['nama']; ?></td>
                                <td class='text-center'>
                                    <a href="/kode/edit/<?= $k['id_kode']; ?>" class='btn btn-warning btn-sm'><span class="fas fa-edit"></a>
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
        var form = document.forms["hapuskode"]; // storing the form
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
                html: "Ada <b>" + jmldata.length + "</b> data kode yang akan dihapus secara permanen",
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
                        'Data kode tidak jadi dihapus',
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