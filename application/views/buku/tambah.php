<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Buku</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('buku/simpan'); ?>">
                <div class="form-group">
                    <label>Kode Buku</label>
                    <input type="text" name="kode_buku" class="form-control" required>
                    <label>Judul Buku</label>
                    <input type="text" name="judul_buku" class="form-control" required>
                    <label>Penulis</label>
                    <input type="text" name="penulis" class="form-control" required>
                    <label>Kategori</label><br>
                    <select id="kategori" name="kategori" class="form-control" required>
                        <option value=""> Pilih </option>
                        <?php foreach($kategori as $k): ?>
                        <option value="<?= $k->nama_kategori; ?>"><?= $k->nama_kategori; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Stok</label>
                    <input type="text" name="stok" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
                <a href="<?= site_url('buku');?>" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>