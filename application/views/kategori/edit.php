<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Kategori</h1>

    <div class="card shadow">
        <div class="card-body">
            <form method="post" action="<?= site_url('kategori/update/'.$kategori->id); ?>">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control"
                        value="<?= $kategori->nama_kategori; ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <a href="<?= site_url('kategori'); ?>" class="btn btn-secondary">
                    Kembali
                </a>
            </form>
        </div>
    </div>
</div>