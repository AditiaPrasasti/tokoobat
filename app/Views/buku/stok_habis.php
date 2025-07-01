<?= $this->include('partials/header') ?>
<?= $this->include('partials/navbar') ?>
<?= $this->include('partials/sidebar') ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Buku Stok Habis</h1>
        <a href="/buku" class="btn btn-secondary mb-3">Kembali</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Obat</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($bukus)) : ?>
                    <tr><td colspan="4" class="text-center">Semua stok tersedia</td></tr>
                <?php endif ?>
                <?php $no = 1; foreach ($bukus as $buku): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($buku->nm_buku) ?></td>
                        <td><?= esc($buku->nama_pb) ?></td>
                        <td><?= esc($buku->stok) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>

<?= $this->include('partials/footer') ?>
