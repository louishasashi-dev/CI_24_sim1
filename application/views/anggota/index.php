<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Anggota</h2>

<a href="<?= site_url('anggota/tambah'); ?>" class="btn btn-primary mb-3">Tambah Anggota</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Anggota</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($anggota as $a): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $a->nomor_anggota; ?></td>
                    <td><?= $a->nama; ?></td>
                    <td><?= $a->alamat; ?></td>
                    <td><?= $a->telepon; ?></td>
                    <td><?= $a->email; ?></td>
                    <td><?= date('d-m-Y', strtotime($a->tanggal_daftar)); ?></td>
                    <td>
                        <a href="<?= site_url('anggota/edit/'.$a->id_anggota); ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="<?= site_url('anggota/hapus/'.$a->id_anggota); ?>"
                           onclick="return confirm('Yakin mau dihapus?')"
                           class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>