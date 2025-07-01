<?= $this->include('partials/header') ?>
<?= $this->include('partials/navbar') ?>
<?= $this->include('partials/sidebar') ?>

<div class="container mt-4">
    <h2>Laporan Pengadaan Obat</h2>
    <p>Berikut adalah daftar obat dengan stok yang perlu segera dibeli ulang:</p>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Nama Penerbit</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($buku_menipis)): ?>
                <tr>
                    <td colspan="4" class="text-center">Semua stok buku aman</td>
                </tr>
            <?php else: ?>
                <?php $no = 1; foreach ($buku_menipis as $buku): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($buku->nm_buku) ?></td>
                        <td><?= esc($buku->nama_pb) ?></td>
                        <td><?= esc($buku->stok) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->include('partials/footer') ?>
