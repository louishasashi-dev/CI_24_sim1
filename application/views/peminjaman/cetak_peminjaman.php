<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan Peminjaman</title>
    <style>
    body {
        font-family: Arial;
    }

    h3 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: center;
    }

    @media print {
        .no-print {
            display: none;
        }
    }
    </style>
</head>

<body>
    <h3>Laporan Peminjaman</h3>

    <?php if(!empty($bulan)): ?>
    <p>Bulan: <?= $bulan; ?></p> <!-- Perbaiki: $bulan bukan $bulam -->
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Jatuh Tempo</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data as $d): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->kode_peminjaman; ?></td>
                <td><?= $d->nama_anggota; ?></td> <!-- Sesuaikan dengan field di model -->
                <td><?= $d->tanggal_pinjam; ?></td>
                <td><?= $d->tanggal_jatuh_tempo; ?></td>
                <td><?= $d->status; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br>
    <p style="text-align:right;">
        Tangerang, <?= date('d-m-Y'); ?><br><br><br>
        (Admin)
    </p>

    <button class="no-print" onclick="window.print()">Cetak</button>
    <button class="no-print" onclick="window.close()">Tutup</button>

    <script>
    // Auto print (optional)
    // window.print();
    </script>
</body>

</html>