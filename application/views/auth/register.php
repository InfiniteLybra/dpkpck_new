<!DOCTYPE html>
<html lang="en">

<head>
    <title>DPKPCK - Sign Up</title>
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
</head>

<section class="background-radial-gradient overflow-hidden align-middle">
    <div class="container px-4 px-md-5 text-center text-lg-start align-middle">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-3 mb-lg-0 hahaha" style="z-index: 10">
                <h1 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Dinas Perumahan, Kawasan Permukiman<br />
                    <span class="text-ijo">dan Cipta Karya</span>
                </h1>
                <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                    Kabupaten Malang, Jawa Timur
                </p>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative hahaha">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong mt-5 ms-5"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                <div class="card bg-glass rounded-4">
                    <div class="card-body px-4 py-5 px-md-5">
                        <div class="mb-4 text-center">
                            <img src="<?php echo base_url('assets/login/'); ?>logokabupaten.png" class="img-thumbnaill" alt="...">
                        </div>

                        <form class="form w-100" action="<?= base_url('auth/proses_register') ?>" method="post" enctype="multipart/form-data">


                            <div class="form-outline mb-3 text-start">

                                <label class="form-label" for="form3Example3">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap minimal 8 karakter" class="form-control bg-transparent" value="<?= set_value('nama_lengkap'); ?>" autocomplete="on" required />
                                <span class="error-message" id="error-nama-lengkap"></span>
                            </div>
                            <div class="form-outline mb-3 text-start">

                                <label class="form-label" for="form3Example4">Username</label>
                                <input type="text" id="username" name="username" placeholder="Masukkan username minimal 8 karakter" class="form-control bg-transparent" value="<?= set_value('username'); ?>" autocomplete="on" required />
                                <span class="error-message" id="error-nama-lengkap"></span>
                            </div>

                            <div class="form-outline mb-3 text-start">
                                <label class="form-label" for="form3Example5">Password</label>
                                <input type="password" id="password" name="password" class="form-control bg-transparent" placeholder="Masukkan password minimal 8 karakter" value="<?= set_value('password'); ?>" autocomplete="on" required />
                            </div>
                            <div class="form-outline mb-3 text-start">
                                <label class="form-label" for="form3Example6">Ulangi Password</label>
                                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Ulangi password" class="form-control bg-transparent" value="<?= set_value('confirmPassword'); ?>" autocomplete="on" required />
                            </div>
                            <div class="form-outline mb-3 text-start">
                                <label class="form-label" for="form3Example4">NIK</label>
                                <input type="text" id="nik" name="nik" placeholder="Masukkan NIK" class="form-control bg-transparent" pattern="[0-9]*" maxlength="16" oninput="validasiAngka(this)" value="<?= set_value('nik'); ?>" autocomplete="on" required />
                            </div>
                            <div class="form-outline mb-3 text-start">
                                <label class="form-label" for="form3Example4">No. Telp</label>
                                <input type="text" id="no_telp" name="nomor" placeholder="Masukkan Nomor Whatsapp" class="form-control bg-transparent" pattern="[0-9]*" maxlength="12" oninput="validasiAngka(this)" value="<?= set_value('nomor'); ?>" autocomplete="on" required />
                            </div>
                            <div class="form-outline mb-3 text-start">
                                <label class="form-label" for="form3Example4">Foto KTP</label>
                                <input type="file" id="foto_ktp" name="foto_ktp" placeholder="" class="form-control bg-transparent" />
                            </div>


                            <div class="d-grid mb-10">
                                <div class="text-center" id="status">
                                    <?php
                                    if ($this->session->flashdata('error')) {
                                        echo '<div class="text-danger">' . $this->session->flashdata('error') . '</div>';
                                    }
                                    ?>
                                </div>
                                <button type="submit" id="submitButton" name="submitButton" class="btn btn-primary">

                                    <span class="indicator-label">Sign up</span>

                                </button>
                            </div>

                        </form>

                        <div class="mt-4 mb-0 py-0 text-center">
                            <div class="text-black">
                                Sudah memiliki akun? <a href="<?= base_url('Auth'); ?>" class="ms-1 hahahaha text-decoration-none">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end::Root-->
    <!-- <script>
        const nama_lengkapInput = document.getElementById('nama_lengkap');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const nikInput = document.getElementById('nik');
        const no_telpInput = document.getElementById('no_telp');
        const submitButton = document.getElementById('submitButton');

        const statusView = document.getElementById('status');

        function validatePassword() {
            const nama_lengkap = nama_lengkapInput.value;
            const username = usernameInput.value;
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            const nik = nikInput.value;
            const no_telp = no_telpInput.value;


            if (password === confirmPassword && password.length > 7 && username.length > 7 && nama_lengkap.length > 7 && nik.length === 16 && no_telp.length === 13) {
                submitButton.disabled = false;
                statusView.innerHTML = '<div class="text-success ">Akun siap dibuat!</div>';
            } else {
                let errorMessage = '<div class="text-danger">Identitas akun belum memenuhi persyaratan:</div>';

                if (password !== confirmPassword) {
                    errorMessage += '<div>Password dan konfirmasi password harus sama.</div>';
                }

                if (password.length <= 7) {
                    errorMessage += '<div>Password harus minimal 8 karakter.</div>';
                }

                if (username.length <= 7) {
                    errorMessage += '<div>Username harus minimal 8 karakter.</div>';
                }

                if (nama_lengkap.length <= 7) {
                    errorMessage += '<div>Nama lengkap harus minimal 8 karakter.</div>';
                }

                if (nik.length !== 16) {
                    errorMessage += '<div>NIK harus terdiri dari 16 digit.</div>';
                }

                if (no_telp.length !== 13) {
                    errorMessage += '<div>No. Telp harus terdiri dari 13 digit.</div>';
                }

                statusView.innerHTML = errorMessage;
                submitButton.disabled = true;
            }

        }

        nama_lengkapInput.addEventListener('input', validatePassword);
        usernameInput.addEventListener('input', validatePassword);
        passwordInput.addEventListener('input', validatePassword);
        confirmPasswordInput.addEventListener('input', validatePassword);
        nikInput.addEventListener('input', validatePassword);
        no_telpInput.addEventListener('input', validatePassword);

        function validasiAngka(input) {
            // Menghapus karakter selain angka
            input.value = input.value.replace(/\D/g, '');

            // Memastikan panjang input tidak melebihi 16 digit
            if (input.value.length > 16) {
                input.value = input.value.slice(0, 16);
            }
        }
    </script> -->
    <script src=" <?= base_url('assets/') ?>assets/plugins/global/plugins.bundle.js "></script>
    <script src=" <?= base_url('assets/') ?>assets/js/scripts.bundle.js "></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toastr-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "15000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // toastr.success("I do not think that means what you think it means.");
        <?php
        if ($this->session->flashdata('success')) {
        ?>
            // toastr.success("I do not think that means what you think it means.");
            toastr.success("<?= $this->session->flashdata('success'); ?>");
        <?php
            // echo $this->session->flashdata();
        } elseif ($this->session->flashdata('error')) {
        ?>
            // toastr.success("I do not think that means what you think it means.");
            toastr.error("<?= $this->session->flashdata('error'); ?>");
        <?php
            // echo $this->session->flashdata();
        } elseif ($this->session->flashdata('warning')) {
        ?>
            // toastr.success("I do not think that means what you think it means.");
            toastr.warning("<?= $this->session->flashdata('warning'); ?>");
        <?php
            // echo $this->session->flashdata();
        } elseif ($this->session->flashdata('info')) {
        ?>
            // toastr.success("I do not think that means what you think it means.");
            toastr.info("<?= $this->session->flashdata('info'); ?>");
        <?php
            // echo $this->session->flashdata();
        }
        ?>
    </script>
    <!--end::Javascript-->
    </body>
    <!--end::Body-->

</html>