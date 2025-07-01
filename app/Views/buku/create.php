<?= $this->include('partials/header') ?>
<?= $this->include('partials/navbar') ?>
<?= $this->include('partials/sidebar') ?>

<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4"><?= $title ?></h1>
        <form action="/buku/store" method="post">
            <div class="mb-3">
                <label>Nama Obat</label>
                <input type="text" name="nm_buku" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jenis Obat</label>
                <select name="kategori" class="form-control" required>
                    <option value="">-- Pilih Jenis Obat--</option>
                    <option value="Generik">Generik</option>
                    <option value="Paten">Paten</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Distributor</label>
                <select name="penerbit_id" class="form-control" required>
                    <?php foreach ($penerbits as $p): ?>
                        <option value="<?= $p->penerbit_id ?>"><?= $p->nama_pb ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</main>

<?= $this->include('partials/footer') ?>
