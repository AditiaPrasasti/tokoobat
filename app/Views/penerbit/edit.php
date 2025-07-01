<?= view('partials/header') ?>
<?= view('partials/navbar') ?>
<?= view('partials/sidebar') ?>

<div class="container mt-4">
    <h3>Edit Distributor</h3>
    <form action="<?= base_url('penerbit/update/' . $penerbit->penerbit_id) ?>" method="post">
        <div class="mb-3">
            <label>Nama Distributor</label>
            <input type="text" name="nama_pb" class="form-control" value="<?= esc($penerbit->nama_pb) ?>" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= esc($penerbit->alamat) ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="kota" class="form-control" value="<?= esc($penerbit->kota) ?>">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control" value="<?= esc($penerbit->telepon) ?>">
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="<?= base_url('penerbit') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= view('partials/footer') ?>
