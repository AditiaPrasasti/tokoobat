<?= view('partials/header') ?>
<?= view('partials/navbar') ?>
<?= view('partials/sidebar') ?>

<div class="container mt-4">
    <h3>Daftar Distributor</h3>
    <a href="<?= base_url('penerbit/create') ?>" class="btn btn-primary mb-3">Tambah Distributor</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penerbits as $index => $penerbit): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= esc($penerbit->nama_pb) ?></td>
                <td><?= esc($penerbit->alamat) ?></td>
                <td><?= esc($penerbit->kota) ?></td>
                <td><?= esc($penerbit->telepon) ?></td>
                <td>
                    <a href="<?= base_url("penerbit/edit/{$penerbit->penerbit_id}") ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url("penerbit/delete/{$penerbit->penerbit_id}") ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= view('partials/footer') ?>
