<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Anggota</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('anggota/simpan'); ?>">
                <div class="form-group">
                    <label>Nomor Anggota</label>
                    <input type="text" name="nomor_anggota" class="form-control" placeholder="Contoh: A001" required>
                    <small class="text-muted">Nomor anggota harus unik/tidak boleh sama</small>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>

                <a href="<?= site_url('anggota'); ?>" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>