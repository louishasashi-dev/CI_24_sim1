<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Anggota</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('anggota/update/'.$anggota->id_anggota); ?>">
                <div class="form-group">
                    <label>Nomor Anggota</label>
                    <input type="text" class="form-control" value="<?= $anggota->nomor_anggota; ?>" disabled>
                    <small class="text-muted">Nomor anggota tidak dapat diubah</small>
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?= $anggota->nama; ?>" required>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3"><?= $anggota->alamat; ?></textarea>
                </div>

                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?= $anggota->telepon; ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $anggota->email; ?>">
                </div>

                <div class="form-group">
                    <label>Tanggal Daftar</label>
                    <input type="date" name="tanggal_daftar" class="form-control" value="<?= $anggota->tanggal_daftar; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="<?= site_url('anggota'); ?>" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>