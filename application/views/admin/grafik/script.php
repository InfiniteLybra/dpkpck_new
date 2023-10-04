<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data hasil survey
            var surveyData = JSON.parse('<?= $sts_encode ?>');

            // Data tanggal survey
            var surveyDates = JSON.parse('<?= $tgl_encode ?>');

            // Menginisialisasi objek untuk menyimpan total survey per bulan
            var surveyCountsPerMonth = {};

            // Loop melalui data tanggal survey dan hitung total survey per bulan
            for (var i = 0; i < surveyDates.length; i++) {
                var date = surveyDates[i];
                var count = parseInt(surveyData[i]);

                if (date && count > 4) {
                    var month = (new Date(date)).toLocaleDateString('en-US', {
                        month: 'long',
                        year: 'numeric'
                    });
                    surveyCountsPerMonth[month] = (surveyCountsPerMonth[month] || 0) + 1; // Hitung jika jumlah survey lebih dari 4
                }
            }

            // Ambil konteks untuk menggambar grafik
            var ctx = document.getElementById('myChart').getContext('2d');

            // Tentukan label bulan
            var monthLabels = Object.keys(surveyCountsPerMonth);

            // Ambil total survey per bulan
            var surveyCounts = Object.values(surveyCountsPerMonth);

            // Buat grafik
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: monthLabels,
                    datasets: [{
                        label: 'Total Survey per Bulan',
                        data: surveyCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Warna batang
                        borderColor: 'rgba(54, 162, 235, 1)', // Warna border
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true // Mulai sumbu y dari 0
                        }
                    }
                }
            });



        });
    </script>