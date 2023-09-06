<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <meta name="description" content="Frontend by unimasoft.id">
    <meta name="author" content="Zamah Sari, zamahsari@umm.ac.id">
    <title>DPKCPK</title>
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
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="<?= base_url('assets/') ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!-- <link href="<?php
                        // echo  base_url('assets/'); 
                        ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" /> -->
    <link href="<?= base_url('assets/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url('assets/amcharts/css/') ?>index.css">
    <link href="<?= base_url('assets/') ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.6.4/leaflet.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="<?= base_url('assets/map/') ?>gh-pages.css" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
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
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            <div id="kt_app_header" class="app-header">
                <!--begin::Header container-->
                <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->
                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="../../demo1/dist/index.html" class="d-lg-none">
                            <img alt="Logo" src="<?= base_url('assets/') ?>assets/media/logos/default-small.svg" class="h-30px" />
                        </a>
                    </div>
                    <!--end::Mobile logo-->
                    <!--begin::Header wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->
                            <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <span class="menu-link">
                                        <span class="menu-title">Apps</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                    <!--end:Menu link-->
                                    <!--begin:Menu sub-->
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px">
                                        <!--begin:Menu item-->
                                        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="ki-duotone ki-shield-tick fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                                <span class="menu-title">User Management</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Users</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="../../demo1/dist/apps/user-management/users/list.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Users List</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="../../demo1/dist/apps/user-management/users/view.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">View User</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
                                                    <!--begin:Menu link-->
                                                    <span class="menu-link">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Roles</span>
                                                        <span class="menu-arrow"></span>
                                                    </span>
                                                    <!--end:Menu link-->
                                                    <!--begin:Menu sub-->
                                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px">
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="../../demo1/dist/apps/user-management/roles/list.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">Roles List</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                        <!--begin:Menu item-->
                                                        <div class="menu-item">
                                                            <!--begin:Menu link-->
                                                            <a class="menu-link" href="../../demo1/dist/apps/user-management/roles/view.html">
                                                                <span class="menu-bullet">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">View Roles</span>
                                                            </a>
                                                            <!--end:Menu link-->
                                                        </div>
                                                        <!--end:Menu item-->
                                                    </div>
                                                    <!--end:Menu sub-->
                                                </div>
                                                <!--end:Menu item-->
                                                <!--begin:Menu item-->
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="../../demo1/dist/apps/user-management/permissions.html">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Permissions</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                                <!--end:Menu item-->
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <!--end:Menu item-->
                                    </div>
                                    <!--end:Menu sub-->
                                </div>
                                <!--end:Menu item-->
                                <!--begin:Menu item-->
                                <!-- <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                    <span class="menu-link">
                                        <a href="#" class="btn btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">
                                            <span class="menu-title">Logout</span>
                                            <span class="menu-arrow d-lg-none"></span>
                                        </a>
                                    </span>
                                </div> -->
                            </div>
                        </div>
                        <!--end::Menu wrapper-->
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0">
                            <!--begin::Theme mode-->
                            <div class="app-navbar-item ms-1 ms-md-3">
                                <!--begin::Menu toggle-->
                                <a href="#" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-night-day theme-light-show fs-2 fs-lg-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                        <span class="path9"></span>
                                        <span class="path10"></span>
                                    </i>
                                    <i class="ki-duotone ki-moon theme-dark-show fs-2 fs-lg-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <!--begin::Menu toggle-->
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-night-day fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                    <span class="path7"></span>
                                                    <span class="path8"></span>
                                                    <span class="path9"></span>
                                                    <span class="path10"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Light</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-moon fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dark</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-screen fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">System</span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                            <!--end::Theme mode-->
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <img src="<?= base_url('assets/') ?>assets/media/svg/avatars/blank.svg" alt="user" />
                                </div>
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <?php if ($this->session->userdata('profile')) { ?>
                                                    <img alt="Logo" src="<?= base_url('assets/') ?>image/profile/<?= $profile->profile ?>" />
                                                <?php } else { ?>
                                                    <img alt="Logo" src="<?= base_url('assets/') ?>assets/media/svg/avatars/blank.svg" />
                                                <?php } ?>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5"><?= $this->session->userdata('nama_lengkap') ?>

                                                    <span class="badge badge-light-<?php
                                                                                    $role = array(
                                                                                        1 => 'Pemohon',
                                                                                        2 => 'Staff',
                                                                                        3 => 'Koordinator',
                                                                                        4 => 'Kepala Bidang',
                                                                                        5 => 'Kepala Dinas',
                                                                                        6 => 'Developer'
                                                                                    );
                                                                                    if ($this->session->userdata('level') == 1) {
                                                                                        echo 'danger';
                                                                                    } elseif ($this->session->userdata('level') == 2 || $this->session->userdata('level') == 3) {
                                                                                        echo 'primary';
                                                                                    } else {
                                                                                        echo 'success';
                                                                                    } ?> fw-bold fs-8 px-2 py-1 ms-2"><?= $role[$this->session->userdata('level')] ?></span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7"><?= $this->session->userdata('nama') ?></a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link px-5">Edit Profile</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">LogOut</a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->
                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
                                    <i class="ki-duotone ki-element-4 fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>
                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Header wrapper-->
                </div>
                <!--end::Header container-->
            </div>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="../../demo1/dist/index.html">
                            <img alt="Logo" src="<?= base_url('assets/') ?>assets/media/logos/default-dark.svg" class="h-25px app-sidebar-logo-default" />
                            <img alt="Logo" src="<?= base_url('assets/') ?>assets/media/logos/default-small.svg" class="h-20px app-sidebar-logo-minimize" />
                        </a>
                        <!--end::Logo image-->
                        <!--begin::Sidebar toggle-->
                        <!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
                        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </div>
                        <!--end::Sidebar toggle-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::sidebar menu-->
                    <?php if ($this->session->userdata('level') == 6) { ?>
                        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                            <!--begin::Menu wrapper-->
                            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('User') ?>">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dashboards</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>

                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">MASTER</span>
                                        </div>
                                        <!--end:Menu content-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Persiapan.html') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <!--begin:Menu link-->
                                        <span class="menu-link">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir ITR</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion">
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Itr') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">ITR Permohonan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        </div>
                                        <!--end:Menu sub-->
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion">
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Itr/pengurusan') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">ITR Kuasa Pengurusan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        </div>
                                        <!--end:Menu sub-->
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion">
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Itr/penerbitan') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">ITR Kuasa Penerbitan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        </div>
                                        <!--end:Menu sub-->
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <!--begin:Menu link-->
                                        <span class="menu-link">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir KKPR</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                        <div class="menu-sub menu-sub-accordion">
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/diwakilkan') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Formulir Surat Kuasa</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/pemilik_lahan_meninggal') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR Pemilik Lahan Meninggal</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/perumahan') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR Perumahan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/tower_menara') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR Tower Provider / Menara Telekomunikasi</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/minimarket') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR Minimarket / Toko Modern</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/peternakan') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR Peternakan</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/spbu') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR SPBU / SPBU Mini / SPBE (Pertamina)</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                            <div class="menu-item">
                                                <!--begin:Menu link-->
                                                <a class="menu-link" href="<?= base_url('Kkpr/tempat_ibadah') ?>">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">KKPR Tempat Ibadah</span>
                                                </a>
                                                <!--end:Menu link-->
                                            </div>
                                        </div>
                                        <!--end:Menu sub-->
                                    </div>
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">SHP Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map/polygon') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map-location-dot fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Polygon Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">ADMIN</span>
                                        </div>
                                        <!--end:Menu content-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">ITR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr_kuasa') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Kuasa</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">KKPR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/admin_kkpr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/config') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Config/Berkas Diterima</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/admin_kkpr_kuasa') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Kuasa</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                    </div>
                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">USER</span>
                                        </div>
                                        <!--end:Menu content-->
                                        <!--begin:Menu item-->
                                        <div class="menu-item">
                                            <!--begin:Menu link-->
                                            <a class="menu-link" href="<?= base_url('Kkpr/pengembalian_formulir') ?>">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">Pengembalian Formulir</span>
                                            </a>
                                            <!--end:Menu link-->
                                        </div>
                                    </div>
                                </div>

                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('level') == 5) { ?>
                        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                            <!--begin::Menu wrapper-->
                            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('User') ?>">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dashboards</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>

                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">MASTER</span>
                                        </div>
                                        <!--end:Menu content-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Persiapan.html') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map/polygon') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map-location-dot fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Polygon Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">ADMINISTRATOR</span>
                                        </div>
                                        <!--end:Menu content-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">ITR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">KKPR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/admin_kkpr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/config') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Config/Berkas Diterima</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                    </div>
                                </div>

                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('level') == 4) { ?>
                        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                            <!--begin::Menu wrapper-->
                            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('User') ?>">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dashboards</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>

                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">MASTER</span>
                                        </div>
                                        <!--end:Menu content-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Persiapan.html') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map/polygon') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map-location-dot fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Polygon Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">ADMINISTRATOR</span>
                                        </div>
                                        <!--end:Menu content-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">ITR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr_kuasa') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Kuasa</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">KKPR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/admin_kkpr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/config') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Config/Berkas Diterima</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                    </div>
                                </div>

                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('level') == 3) { ?>
                        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                            <!--begin::Menu wrapper-->
                            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('User') ?>">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dashboards</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>

                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">MASTER</span>
                                        </div>
                                        <!--end:Menu content-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Persiapan.html') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map/polygon') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map-location-dot fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Polygon Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">ADMINISTRATOR</span>
                                        </div>
                                        <!--end:Menu content-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">ITR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr_kuasa') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Kuasa</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">KKPR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/admin_kkpr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/config') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Config/Berkas Diterima</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                    </div>
                                </div>

                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('level') == 2) { ?>
                        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                            <!--begin::Menu wrapper-->
                            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('User') ?>">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dashboards</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>

                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">MASTER</span>
                                        </div>
                                        <!--end:Menu content-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Persiapan.html') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Map/polygon') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-map-location-dot fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Polygon Map</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">ADMINISTRATOR</span>
                                        </div>
                                        <!--end:Menu content-->
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">ITR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Itr/admin_itr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <!--begin:Menu link-->
                                            <span class="menu-link">
                                                <span class="menu-icon">
                                                    <i class="fa-solid fa-file-import fa-2xl"></i>
                                                </span>
                                                <span class="menu-title">KKPR</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                                            <!--end:Menu link-->
                                            <!--begin:Menu sub-->
                                            <div class="menu-sub menu-sub-accordion">
                                                <div class="menu-item">
                                                    <!--begin:Menu link-->
                                                    <a class="menu-link" href="<?= base_url('Kkpr/admin_kkpr') ?>">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                                        <span class="menu-title">Admin Permohonan</span>
                                                    </a>
                                                    <!--end:Menu link-->
                                                </div>
                                            </div>
                                            <!--end:Menu sub-->
                                        </div>
                                    </div>
                                </div>

                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('level') == 1) { ?>
                        <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                            <!--begin::Menu wrapper-->
                            <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('User') ?>">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-element-11 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Dashboards</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>

                                    <div class="menu-item pt-5">
                                        <!--begin:Menu content-->
                                        <div class="menu-content">
                                            <span class="menu-heading fw-bold text-uppercase fs-7">MASTER</span>
                                        </div>
                                        <!--end:Menu content-->
                                    </div>
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Persiapan.html') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Formulir</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>                                                           
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="<?= base_url('Kkpr/pengembalian_formulir') ?>">
                                            <span class="menu-icon">
                                                <i class="fa-solid fa-file fa-2xl"></i>
                                            </span>
                                            <span class="menu-title">Pengembalian Formulir</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                </div>

                                <!--end::Menu-->
                            </div>
                            <!--end::Menu wrapper-->
                        </div>
                    <?php } ?>
                    <!--end::sidebar menu-->
                    <!--begin::Footer-->
                    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
                        <a href="https://preview.keenthemes.com/html/metronic/docs" class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
                            <span class="btn-label">Docs & Components</span>
                            <i class="ki-duotone ki-document btn-icon fs-2 m-0">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        Judul Page</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Judul</a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">Sub Judul</li>
                                        <!--end::Item-->
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <ol class="breadcrumb text-muted fs-6 fw-semibold">
                                        <li class="breadcrumb-item"><a href="" class="">Contoh</a></li>
                                        <li class="breadcrumb-item"><a href="" class="">Contoh</a></li>
                                    </ol>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">