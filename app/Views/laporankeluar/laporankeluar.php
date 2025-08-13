<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
            font-family: "Times New Roman";
        }

        td,
        th {
            border: 1px solid #000000;
        }
    </style>
</head>

<body>
    <h4 style="text-align: center;">LAPORAN SURAT KELUAR</h4>
    <hr>
    <p style="font-family: 'Times New Roman'; font-size: 12px;">Dari Tanggal&emsp;: <?= date('d-M-Y', strtotime($tgl_awal)); ?> &emsp;Sampai Tanggal : <?= date('d-M-Y', strtotime($tgl_akhir)); ?></p>
    <table cellpadding="5">
        <thead>
            <tr style="text-align: center;">
                <th width="30" rowspan="2"><strong>NO</strong></th>
                <th width="95" rowspan="2"><strong>TANGGAL SURAT</strong></th>
                <th width="125" rowspan="2"><strong>NOMOR SURAT</strong></th>
                <th width="160" rowspan="2"><strong>TUJUAN SURAT</strong></th>
                <th width="400" rowspan="2"><strong>ISI SURAT</strong></th>
                <th width="50" colspan="2"><strong>KETERANGAN</strong></th>
            </tr>
            <tr style="text-align: center;">
                <th><strong>RETENSI</br> AKTIF</strong></th>
                <th><strong>PENGOLAH/</br>PENYIMPAN</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($surat_keluar as $sk) : ?>
                <tr>
                    <td width="30" style="text-align: center;"><?= sprintf("%03d", $sk['no_agenda']); ?></td>
                    <td width="95" style="text-align: center;"><?= date('d-M-Y', strtotime($sk['tgl_skeluar'])); ?></td>
                    <td width="125"><?= $sk['no_skeluar']; ?></td>
                    <td width="160"><?= $sk['tujuan_surat']; ?></td>
                    <td width="400"><?= $sk['isi_surat']; ?></td>
                    <td width="25"><?= $sk['retensi_aktif']; ?></td>
                    <td width="25"><?= $sk['pengolah']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        window.print()
    </script>
</body>

</html>