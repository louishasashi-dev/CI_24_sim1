</div>
</div>

<script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>

<!-- Bootstrap JS via CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>

<!-- Pindahkan Chart.js ke sini, sebelum dipakai -->
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

<script>
$(document).ready(function() {

    // DataTable - hanya jika elemen #dataTable ada di halaman
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            "language": {
                "search": "Cari :",
                "lengthMenu": "Tampilkan _MENU_ data",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Berikutnya"
                }
            }
        });
    }

    // Chart - hanya jika elemen #chartDashboard ada di halaman
    if ($('#chartDashboard').length) {
        var ctx = document.getElementById("chartDashboard");
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Buku', 'Anggota', 'Peminjaman'],
                datasets: [{
                    label: 'Jumlah Data',
                    data: [
                        <?= isset($total_buku) ? $total_buku : 0; ?>,
                        <?= isset($total_anggota) ? $total_anggota : 0; ?>,
                        <?= isset($total_peminjaman) ? $total_peminjaman : 0; ?>
                    ],
                    backgroundColor: [
                        '#4e73df',
                        '#1cc88a',
                        '#f6c23e'
                    ]
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

});
</script>

</body>

</html>