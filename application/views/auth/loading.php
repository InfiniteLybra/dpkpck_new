<!DOCTYPE html>
<html lang="en">

<head>
    <title>DPKPCK - OTP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/'); ?>assets/img/Logosaja_E-Pora.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/'); ?>login.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="<?php echo base_url('assets/login/'); ?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        section {
            height: auto;
        }

        @media (min-width: 767px) {
            section {
                height: 100vh;
                /* Atau hapus properti height sama sekali */
            }
        }
    </style>
    <style>
        .otp-field input[type="number"] {
            width: 75px;
            height: 75px;
            font-size: 30px;
            /* Ubah ukuran teks sesuai keinginan Anda */
            font-weight: bold;
        }
    </style>
</head>

<body>
    <section class="background-radial-gradient align-middle  overflow-y-scroll overflow-x-hidden">
    <div class="center-vertically-horizontally2">
        <div class="container px-4 px-md-5 text-center text-lg-start align-middle">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-3 mb-lg-0 atas" style="z-index: 10">
                    <h1 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Dinas Perumahan, Kawasan Permukiman<br />
                        <span class="text-ijo">dan Cipta Karya</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Kabupaten Malang, Jawa Timur
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative atas    ">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong mt-5 ms-5"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass rounded-4" >
                        <div class="card-body px-4 py-5 px-md-5">
                            <div class="mb-4 text-center">
                                <img src="<?php echo base_url('assets/login/'); ?>logokabupaten.png" class="img-thumbnaill" alt="...">
                            </div>
                            <!-- Form input -->
                            <form action="#">
                                <div class="text-otp text-center fw-bold">Pendaftaran Akun</div>
                                <p class="my-4 mt-2 py-0 text-center text-black">Permintaan pendaftaran akun Anda sedang dilakukan.<br> Silahkan Kembali dalam waktu :</p>

                                <div class="otp-field mb-5">
                                    <input class="me-1" type="number" id="menit" disabled style="width: 75px; height: 75px;" />
                                    <span><b>:</b></span>
                                    <input class="ms-1" type="number" id="detik" disabled style="width: 75px; height: 75px;" />
                                </div>

                                <div class="mt-1 mb-0 py-0 text-center">
                                    <div class="text-black" id="pesanSetelahWaktuHabis" style="display: none;">
                                        Pendaftaran akun anda berhasil dilakukan kembali ke <a href="<?= base_url('Auth'); ?>" class="ms-1 hahahaha">Halaman Masuk</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <div id="countdown" hidden></div>

    <!-- ... (kode sebelumnya) ... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

        function startCountdown() {
            var duration = Math.floor(Math.random() * 10) + 1; 
            var countdownElement = document.getElementById('countdown');

            var timer = setInterval(function() {
                var minutes = Math.floor(duration / 60);
                var seconds = duration % 60;
                var countdownText = 'Waktu tersisa: ' + minutes + ' menit ' + seconds + ' detik';

                countdownElement.textContent = countdownText;

                if (duration <= 0) {
                    clearInterval(timer);
                    console.log('id:', <?= $id; ?>);
                    console.log('status_verivikasi:', 'Terverifikasi');
                    $.ajax({
                        url: '<?= base_url('Auth/update_verification_status'); ?>',
                        type: 'POST',
                        data: {
                            id: <?= $id; ?>,
                            status_verivikasi: 'Terverifikasi'
                        },
                        success: function(response) {
                            window.location.href = '<?= base_url('Auth'); ?>';
                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.status + ': ' + xhr.statusText);
                        }
                    });
                }


                duration--;
            }, 1000); // Perbarui setiap 1 detik
        }

        // Mulai menghitung mundur saat halaman dimuat
        window.onload = function() {
            startCountdown();
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="<?php echo base_url('assets/login/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets/login/'); ?>vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url('assets/login/'); ?>vendor/tilt/tilt.jquery.min.js"></script>
	
	<script type="text/javascript">
		var waktu = 180; // Ubah nilai awal menjadi 180 detik (3 menit).
		var menitElement = document.getElementById("menit");
		var detikElement = document.getElementById("detik");
		var pesanSetelahWaktuHabisElement = document.getElementById("pesanSetelahWaktuHabis");
	
		setInterval(function() {
			waktu--;
			if (waktu < 0) {
				pesanSetelahWaktuHabisElement.style.display = "block"; // Menampilkan pesan setelah waktu habis
				// Anda juga dapat menambahkan kode lain di sini jika diperlukan.
			} else {
				var menit = Math.floor(waktu / 60); // Hitung menit
				var detik = waktu % 60; // Hitung detik
				menitElement.value = menit;
				detikElement.value = detik;
			}
		}, 1000);
	</script>
	
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>
	<script src="login.js"></script>

</body>

</html>