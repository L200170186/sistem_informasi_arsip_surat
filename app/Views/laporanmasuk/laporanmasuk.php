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
    <h3 style="text-align: center;">LAPORAN SURAT MASUK</h3>
    <hr>
    <p style="font-family: 'Times New Roman'; font-size: 12px;">Dari Tanggal : <?= date('d-M-Y', strtotime($tgl_awal)); ?> &emsp;Sampai Tanggal : <?= date('d-M-Y', strtotime($tgl_akhir)); ?></p>
    <table cellpadding="5">
        <thead>
            <tr style="text-align: center;">
                <th width="30" rowspan="2"><strong>NO</strong></th>
                <th width="95" rowspan="2"><strong>TANGGAL TERIMA SURAT</strong></th>
                <th width="125" rowspan="2"><strong>NOMOR DAN TANGGAL SURAT</strong></th>
                <th width="160" rowspan="2"><strong>ASAL SURAT</strong></th>
                <th width="400" rowspan="2"><strong>ISI SURAT</strong></th>
                <th width="50" colspan="2"><strong>KETERANGAN</strong></th>
            </tr>
            <tr style="text-align: center;">
                <th><strong>RETENSI</br> AKTIF</strong></th>
                <th><strong>PENGOLAH/</br>PENYIMPAN</strong></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($surat_masuk as $sm) : ?>
                <tr>
                    <td width="30" style="text-align: center;" rowspan="2"><?= sprintf("%03d", $sm['no_agenda']); ?></td>
                    <td width="95" style="text-align: center;" rowspan="2"><?= date('d-M-Y', strtotime($sm['tgl_terima'])); ?></td>
                    <td width="125"> <?= $sm['no_smasuk']; ?></td>
                    <td width="160" rowspan="2"><?= $sm['asal_surat']; ?></td>
                    <td width="400" rowspan="2"><?= $sm['isi_surat']; ?></td>
                    <td width="25" rowspan="2"><?= $sm['retensi_aktif']; ?></td>
                    <td width="25" rowspan="2"><?= $sm['pengolah']; ?></td>
                </tr>
                <!-- <hr> -->
                <tr>
                    <td width="125"><?= date('d-M-Y', strtotime($sm['tgl_smasuk'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        window.print()
    </script>
</body>

</html>