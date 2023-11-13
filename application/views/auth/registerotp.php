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
</head>

<body>
    <section class="background-radial-gradient overflow-hidden align-middle">

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

                    <div class="card bg-glass rounded-4">
                        <div class="card-body px-4 py-5 px-md-5">
                            <div class="mb-4 text-center">
                                <img src="<?php echo base_url('assets/login/'); ?>logokabupaten.png" class="img-thumbnaill" alt="...">
                            </div>

                            <form class="form w-100" action="<?= base_url('Auth/proses_register') ?>" method="post">
                                <div class="text-otp text-center">Verification Code</div>
                                <div class="text-otp1 mb-4 text-center">Your code was sent to you via SMS</div>
                                <div class="fv-row mb-8">
                                <label class="form-label" for="form3Example3">Kode OTP</label>
                                    <input id="otp" placeholder="xxxxxx" name="otp" type="password" autocomplete class="form-control bg-transparent" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
                                </div>
                                <div class="d-grid mb-10 mt-3">
                                    <a href="<?= base_url('Auth/kirim_otp'); ?>/<?= $this->session->userdata('nomor') ?>" class="ms-1 hahahaha text-center text-decoration-none">Kirim ulang kode verifikasi</a>
                                </div>
                                <input id="nomor" value="<?= $this->session->userdata('nomor') ?>" placeholder="xxxxxx" name="nomor" type="hidden" autocomplete class="form-control bg-transparent" />
                                <div style="margin: 0 auto; display: flex; flex-direction: column;">
                                    <button type="submit" id="otpButton" name="otpButton" class="btn btn-block mt-4 rounded btn-success">Verifikasi</button>
                                </div>
                                <div class="mt-4 mb-0 py-0 text-center">
                                    <div class="text-black">
                                        Sudah memiliki akun? <a href="<?= base_url('Auth'); ?>" class="ms-1 hahahaha text-decoration-none">Login</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const otpinput = document.getElementById('otp');
        const submitButton = document.getElementById('submitButton');

        const statusView = document.getElementById('status');

        function validatePassword() {
            const otp = otpinput.value;
            const confirmPassword = confirmPasswordInput.value;


            if (otp.length > 5) {
                submitButton.disabled = false;


                statusView.innerHTML = '<div class="text-success ">Akun siap dibuat!</div>';
            } else {
                statusView.innerHTML = '<div class="text-danger ">Identitas akun belum memenuhi persyaratan!</div>';
                submitButton.disabled = true;

            }
        }

        otpinput.addEventListener('input', validatePassword);
    </script>
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
            "timeOut": "5000",
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="<?php echo base_url('assets/login/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url('assets/login/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/login/'); ?>vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url('assets/login/'); ?>vendor/tilt/tilt.jquery.min.js"></script>

    <script>
        const inputs = document.querySelectorAll(".otp-field > input");
        const button = document.querySelector(".btn");

        window.addEventListener("load", () => inputs[0].focus());
        // button.setAttribute("disabled", "disabled");

        inputs[0].addEventListener("paste", function(event) {
            event.preventDefault();

            const pastedValue = (event.clipboardData || window.clipboardData).getData(
                "text"
            );
            const otpLength = inputs.length;

            for (let i = 0; i < otpLength; i++) {
                if (i < pastedValue.length) {
                    inputs[i].value = pastedValue[i];
                    inputs[i].removeAttribute("disabled");
                    inputs[i].focus;
                } else {
                    inputs[i].value = ""; // Clear any remaining inputs
                    inputs[i].focus;
                }
            }
        });

        inputs.forEach((input, index1) => {
            input.addEventListener("keyup", (e) => {
                const currentInput = input;
                const nextInput = input.nextElementSibling;
                const prevInput = input.previousElementSibling;

                if (currentInput.value.length > 1) {
                    currentInput.value = "";
                    return;
                }

                if (
                    nextInput &&
                    nextInput.hasAttribute("disabled") &&
                    currentInput.value !== ""
                ) {
                    nextInput.removeAttribute("disabled");
                    nextInput.focus();
                }

                if (e.key === "Backspace") {
                    inputs.forEach((input, index2) => {
                        if (index1 <= index2 && prevInput) {
                            input.setAttribute("disabled", true);
                            input.value = "";
                            prevInput.focus();
                        }
                    });
                }

                button.classList.remove("active");
                button.setAttribute("disabled", "disabled");

                const inputsNo = inputs.length;
                if (!inputs[inputsNo - 1].disabled && inputs[inputsNo - 1].value !== "") {
                    button.classList.add("active");
                    button.removeAttribute("disabled");

                    return;
                }
            });
        });
    </script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="js/main.js"></script>
    <script src="login.js"></script>
</body>
<!--end::Body-->

</html>