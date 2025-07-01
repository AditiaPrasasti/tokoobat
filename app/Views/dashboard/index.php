<?= $this->include('partials/header') ?>
<?= $this->include('partials/navbar') ?>
<?= $this->include('partials/sidebar') ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>

        <!-- Notifikasi Stok Habis -->
        <?php if (!empty($stokHabis)) : ?>
            <div class="alert alert-danger">
                <strong>Stok Habis:</strong>
                <ul class="mb-0">
                    <?php foreach ($stokHabis as $buku): ?>
                        <li><?= esc($buku['nm_buku']) ?> - <?= esc($buku['nama_pb']) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Grafik Stok Buku -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-bar me-1"></i> Grafik Stok Obat
            </div>
            <div class="card-body">
                <canvas id="stokChart"></canvas>
            </div>
        </div>
    </div>
</main>

<?= $this->include('partials/footer') ?>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('stokChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($chartData, 'nm_buku')) ?>,
            datasets: [{
                label: 'Jumlah Stok',
                data: <?= json_encode(array_column($chartData, 'stok')) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Stok'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Judul Buku'
                    },
                    ticks: {
                        autoSkip: false,
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });
</script>
