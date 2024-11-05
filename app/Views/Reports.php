<?= $this->extend('Layout');?>

<?= $this->section('Content');?>

<div class="row m-4">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="text-muted">Vehicle number per type</h5>
            </div>
            <div class="card-body">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="text-muted">Vehicle number per date</h5>
            </div>
            <div class="card-body">
                <canvas id="dateChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mx-4">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="text-muted">Profits per date</h5>
            </div>
            <div class="card-body">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/Chart.min.js'); ?>"></script>

<script>
    //
    // Définition des couleurs
    const colors = [
            'rgba(255, 99, 132, 0.6)',  // Rouge pastel
            'rgba(0, 97, 252, 0.6)',  // Bleu clair
            'rgba(75, 192, 192, 0.6)',  // Vert turquoise
            'rgba(153, 102, 255, 0.6)', // Violet
            'rgba(255, 206, 86, 0.6)',  // Jaune
            'rgba(255, 159, 64, 0.6)'   // Orange
        ];
    const ctxCategory = document.getElementById('categoryChart').getContext('2d');
    const categoryChart = new Chart(ctxCategory, {
        type: 'bar',
        data: {
            labels: <?= json_encode($categories); ?>,
            datasets: [{
                label: '# vehicle by category',
                data: <?= json_encode($vehicleCounts); ?>,
                backgroundColor:  colors,
                borderColor: colors.map(color => color.replace('0.6', '1')),
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    //
    const ctxDate = document.getElementById('dateChart').getContext('2d');
    const dateChart = new Chart(ctxDate, {
        type: 'line',
        data: {
            labels: <?= json_encode($dates); ?>,
            datasets: [{
                label: '# vehicle by date',
                data: <?= json_encode($vehiclesByDate); ?>,
                fill: false,
                borderColor: 'rgba(153, 102, 255, 1)',
                tension: 0.1
            }]
        },
        
    });
    //
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctxRevenue, {
        type: 'bar',
        data: {
            labels: <?= json_encode($dates); ?>,
            datasets: [{
                label: 'Earning by date',
                data: <?= json_encode($revenuesByDate); ?>,
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<?= $this->endSection();?>