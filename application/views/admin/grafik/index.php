<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>My Chart.js Chart</title>
</head>

<body>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'dpkcpk');

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    $query = $conn->query("SELECT tgl_survei AS tanggal_survei, status_berkas FROM kkpr_permohonan");

    $tgl_survey = [];
    $sts_berkas = [];

    if ($query->num_rows > 0) {
        while ($data = $query->fetch_assoc()) {
            $tgl_survey[] = $data['tanggal_survei'];
            $sts_berkas[] = $data['status_berkas'];
        }
    } else {
        echo "Tidak ada data.";
    }

    $tgl_encode = json_encode($tgl_survey);
    $sts_encode = json_encode($sts_berkas);

    $result = [];

    foreach ($sts_berkas as $value) {
        if ((int)$value > 5) {
            $result[] = (int)$value;
        }
    }
    ?>

    <div class="container">
        <canvas id="myChart"></canvas>
    </div>
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
</body>

</html>