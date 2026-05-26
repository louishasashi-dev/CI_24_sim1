<div class="container-fluid">
    <h3>Laporan Buku</h3>

    <form method="get">
        <select name="kategori" class="form-control form-control-sm d-inline w-auto">
            <option value="">-- Semua Kategori --</option>
            <?php foreach ($list_kategori as $k): ?>
            <option value="<?= $k->kategori; ?>" <?= ($kategori == $k->kategori) ? 'selected' : ''; ?>>
                <?= $k->kategori; ?>
            </option>
            <?php endforeach; ?>
        </select>

        <select name="ketersediaan" class="form-control form-control-sm d-inline w-auto ml-2">
            <option value="">-- Semua Ketersediaan --</option>
            <option value="tersedia" <?= ($ketersediaan == 'tersedia') ? 'selected' : ''; ?>>Tersedia</option>
            <option value="habis" <?= ($ketersediaan == 'habis')    ? 'selected' : ''; ?>>Habis</option>
        </select>

        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?= site_url('laporan/buku'); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>

    <br>

    <a href="<?= site_url('laporan/cetak_buku?kategori=' . $kategori . '&ketersediaan=' . $ketersediaan); ?>"
        target="_blank" class="btn btn-success btn-sm">
        Cetak PDF
    </a>

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Ketersediaan</th>
        </tr>

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
                <span class="badge badge-success">Tersedia</span>
                <?php else: ?>
                <span class="badge badge-danger">Habis</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>