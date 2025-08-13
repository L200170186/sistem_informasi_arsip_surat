<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <?php if (session()->getFlashdata('login')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('login'); ?>
        </div>
    <?php endif; ?>


    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Surat Masuk</div>
                            <?php foreach ($suratmasuk as $sm) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sm['id_suratmasuk']; ?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-400"></i>
                            <!-- <i class="fas fa-fw fa-folder fa-2x text-gray-300"></i> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Surat Keluar</div>
                            <?php foreach ($suratkeluar as $sk) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sk['id_suratkeluar']; ?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Masuk (<?= date('Y'); ?>)
                            </div>
                            <?php foreach ($suratmasuk2 as $sm2) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sm2['id_suratmasuk']; ?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Surat Keluar (<?= date('Y'); ?>)
                            </div>
                            <?php foreach ($suratkeluar2 as $sk2) : ?>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sk2['id_suratkeluar']; ?></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paper-plane fa-2x text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-gradient-dark">
                    <h6 class="m-0 font-weight-bold text-gray-100">Grafik Jumlah Surat Pada 12 Bulan Terakhir (Tahun <?= date('Y'); ?>)</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<!-- /.container-fluid -->
<?= $this->endSection(); ?>

<?= $this->section('grafik'); ?>
<script>
    var ctx = document.getElementById("myBarChart");

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            datasets: [{
                label: "Surat Masuk",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: <?php echo json_encode($grafikmasuk); ?>,
            }, {
                label: "Surat Keluar",
                backgroundColor: "#1cc88a",
                hoverBackgroundColor: "#00ac69",
                borderColor: "##1cc88a",
                data: <?php echo json_encode($grafikkeluar); ?>,
            }],

        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,

                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: true
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>
<?= $this->endSection(); ?>