<?= view('partials/header') ?>
<?= view('partials/navbar') ?>
<?= view('partials/sidebar') ?>

<div class="container mt-4">
    <h3>Tambah Distributor</h3>
    <form action="<?= base_url('penerbit/store') ?>" method="post">
        <div class="mb-3">
            <label>Nama Distributor</label>
            <input type="text" name="nama_pb" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="kota" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>
        <button class="btn btn-success">Simpan</button>
        <a href="<?= base_url('penerbit') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= view('partials/footer') ?>
