<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>Metronic - The World's #1 Selling Bootstrap Admin Template by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?= base_url('assets/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <style>
        .loader {
            margin: auto;
            border: 20px solid #EAF0F6;
            border-radius: 50%;
            border-top: 20px solid #FF7A59;
            width: 200px;
            height: 200px;
            animation: spinner 4s linear infinite;
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('<?= base_url('assets/') ?>assets/media/auth/bg10.jpeg');
            }

            [data-bs-theme="dark"] body {
                background-image: url('<?= base_url('assets/') ?>assets/media/auth/bg10-dark.jpeg');
            }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <!--begin::Image-->
                    <img class="theme-light-show mx-auto mw-100 w-200px w-lg-550px mb-10 mb-lg-20" src="<?= base_url('assets/') ?>image/logo_dpkcpk.png" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-200px w-lg-550px mb-10 mb-lg-20" src="<?= base_url('assets/') ?>image/logo_dpkcpk.png" alt="" />
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Dinas Perumahan, Kawasan Permukiman dan Cipta Karya</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="text-gray-600 fs-base text-center fw-semibold">
                        Pelaksanaan kebijakan teknis perencanaan, pembangunan, operasi dan pemeliharaan, pemantauan dan evaluasi pengelolaan prasarana, sarana dan utilitas umum perumahan dan kawasan permukiman sesuai luasan wilayah yang ditetapkan
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <!--begin::Wrapper-->
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10 border border-<?php
                                                                                                            if ($this->session->flashdata('error')) {
                                                                                                                echo 'danger';
                                                                                                            } else {
                                                                                                                echo 'dark';
                                                                                                            }
                                                                                                            ?>
                 shadow">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <!--begin::Form-->
                            <form class="form w-100" action="<?= base_url('auth/register_sukses') ?>" method="post" id="myForm">
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-dark fw-bolder mb-3">Membuat Akun</h1>
                                    <!--end::Title-->
                                    <!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                                    <!--end::Subtitle=-->
                                </div>
                                <!--begin::Heading-->
                                <div class="loader mb-5"></div>
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <input type="text" name="nik" required value="<?= $nik ?>" class="form-control bg-transparent" readonly />
                                    <input type="text" name="username" required value="<?= $username ?>" class="form-control bg-transparent" readonly />
                                    <!--end::Email-->
                                </div>
                                <!--end::Input group=-->
                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <button type="submit" id="submitButton" class="btn btn-primary" disabled>
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Verifikasi</span>
                                        <!--end::Indicator label-->
                                    </button>
                                </div>
                                <!--end::Submit button-->
                                <!--begin::Sign up-->
                                <div class="text-gray-500 text-center fw-semibold fs-6">
                                    Jangan tutup sedang verifikasi, proses ini membutuhkan 1-3 menit.
                                    <br>
                                    Jika tutup maka gagal proses verifikasi dan hangus NIK dan No Telp. yang telah dibuat.
                                </div>
                                <!--end::Sign up-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->

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
    <script>
        var waktuTunda = 57000; // 5000 ms (5 detik)

        // Fungsi untuk mengirimkan formulir setelah waktu tertentu
        function kirimFormSetelahWaktuTertentu() {
            setTimeout(function() {
                document.getElementById("myForm").submit();
            }, waktuTunda);
        }

        // Panggil fungsi untuk memulai tindakan otomatis
        kirimFormSetelahWaktuTertentu();
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>