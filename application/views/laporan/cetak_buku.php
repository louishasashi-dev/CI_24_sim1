<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan Buku</title>
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
    <h3>Laporan Buku</h3>

    <?php if (!empty($kategori)): ?>
    <p>Kategori: <?= $kategori; ?></p>
    <?php endif; ?>

    <?php if (!empty($ketersediaan)): ?>
    <p>Ketersediaan: <?= ucfirst($ketersediaan); ?></p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Ketersediaan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($data as $d): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->kode_buku; ?></td>
                <td><?= $d->judul_buku; ?></td>
                <td><?= $d->penulis; ?></td>
                <td><?= $d->kategori; ?></td>
                <td><?= $d->stok; ?></td>
                <td>
                    <?php if ($d->stok > 0): ?>
                    Tersedia
                    <?php else: ?>
                    Habis
                    <?php endif; ?>
                </td>
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

</body>

</html>