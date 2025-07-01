<?= $this->include('partials/header') ?>
<?= $this->include('partials/navbar') ?>
<?= $this->include('partials/sidebar') ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Obat</h1>

        <!-- Alert stok habis -->
        <?php if ($stok === 'habis') : ?>
            <div class="alert alert-warning">Menampilkan hanya obat dengan stok habis.</div>
        <?php endif; ?>

        <a href="/buku/create" class="btn btn-primary mb-3">Tambah Obat</a>

        <!-- Search & Filter Form -->
        <form method="get" action="<?= base_url('buku') ?>" class="row mb-3 g-2">
            <div class="col-md-6">
                <input type="text" name="keyword" value="<?= esc($keyword) ?>" class="form-control" placeholder="Cari berdasarkan judul obat...">
            </div>
            <div class="col-md-3">
                <select name="stok" class="form-control">
                    <option value="">-- Semua Stok --</option>
                    <option value="habis" <?= $stok == 'habis' ? 'selected' : '' ?>>Stok Habis</option>
                    <option value="tersedia" <?= $stok == 'tersedia' ? 'selected' : '' ?>>Tersedia</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success">Cari</button>
                <a href="<?= base_url('buku') ?>" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Distributor</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($bukus)) : ?>
                    <tr><td colspan="7" class="text-center">Data tidak ditemukan.</td></tr>
                <?php else : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($bukus as $buku) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($buku->nm_buku) ?></td>
                            <td><?= esc($buku->kategori) ?></td>
                            <td><?= number_format($buku->harga) ?></td>
                            <td><?= esc($buku->stok) ?></td>
                            <td><?= esc($buku->nama_pb) ?></td>
                            <td>
                                <a href="/buku/edit/<?= $buku->buku_id ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/buku/delete/<?= $buku->buku_id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<?= $this->include('partials/footer') ?>
