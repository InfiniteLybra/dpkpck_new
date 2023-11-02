<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <!-- <base href="../../../" /> -->
    <title>Dinas Perumahan, Kawasan Permukiman dan CIpta Karya</title>
    <meta charset="utf-8" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?= base_url('assets/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
        <!--begin::Authentication - Sign-in -->
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
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10 border border-<?php if ($this->session->flashdata('error')) {
                                                                                                                echo 'danger';
                                                                                                            } else {
                                                                                                                echo 'dark';
                                                                                                            } ?> shadow">
                    <!--begin::Content-->
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <!--begin::Form-->
                            <form class="form w-100" action=" <?= base_url('auth/proses_log') ?>" method="post">
                                <!--begin::Heading-->
                                <div class="text-center mb-11">
                                    <!--begin::Title-->
                                    <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                                    <!--end::Title-->
                                    <!--begin::Subtitle-->
                                    <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                                    <!--end::Subtitle=-->
                                </div>
                                <!--begin::Heading-->
                                <!--begin::Input group=-->
                                <div class="fv-row mb-8">
                                    <!--begin::Email-->
                                    <div class="text-gray">Username</div>
                                    <input type="text" placeholder="masukkan username" name="username" autocomplete="off" class="form-control bg-transparent" />
                                    <!--end::Email-->
                                </div>
                                <!--end::Input group=-->
                                <div class="fv-row mb-8">
                                    <!--begin::Password-->
                                    <div class="text-gray">Password</div>
                                    <input type="password" placeholder="masukkan password" name="password" autocomplete="off" class="form-control bg-transparent" />
                                    <!--end::Password-->
                                </div>
                                <!--end::Input group=-->
                                <!--begin::Submit button-->
                                <div class="d-grid mb-10">
                                    <?php
                                    if ($this->session->flashdata('error')) {
                                        echo '<div class="text-danger text-center">Kesalahan, username atau password salah</div>';
                                    }
                                    ?>
                                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">Sign In</span>
                                    </button>
                                </div>
                                <!--end::Submit button-->
                                <!--begin::Sign up-->
                                <div class="text-gray-500 text-center fw-semibold fs-6">Belum punya akun?
                                    <a href="<?= base_url('auth/register') ?>" class="link-primary">Sign up</a>
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
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "<?= base_url('assets/') ?>assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?= base_url('assets/') ?>assets/plugins/global/plugins.bundle.js"></script>
    <script src="<?= base_url('assets/') ?>assets/js/scripts.bundle.js"></script>
    <!--end::Javascript-->
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
</body>
<!--end::Body-->

</html>