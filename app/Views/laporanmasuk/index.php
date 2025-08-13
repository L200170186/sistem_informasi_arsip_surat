<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Laporan Surat Masuk</h1>
    <div class="mb-5">
        <div class="card border-left-info shadow h-100">
            <div class="card-body">
                <h5 class="font-weight-bold text-gray-900 mb-3"></i>Cetak Laporan Surat Masuk</h5>
                <form action="/laporanmasuk/cetaksuratmasuk" method="post" enctype="multipart/form-data" target="_blank">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Dari Tanggal:</label>
                            <input type="date" class="form-control" name="dari" required>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Sampai Tanggal:</label>
                            <input type="date" class="form-control" name="sampai" required>
                        </div>
                        <div class="col-md-3">
                            <label for="exampleInputPassword1" class="form-label">Filter Berdasarkan:</label>
                            <select class="form-control" id="berdasarkan" name="berdasarkan" required>
                                <option value="">Pilih Berdasarkan...</option>
                                <option value="tgl_terima">Tanggal Terima</option>
                                <option value="tgl_smasuk">Tanggal Surat</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-2">
                            <button type="submit" class="btn btn-success mt-4"><i class="fas fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>