<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
	<base href="" />
	<title>DPK-PCK</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="#" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="#" />
	<meta property="og:site_name" content="DPK-PCK | WEB" />
	<link rel="canonical" href="#" />
	<link rel="shortcut icon" href="#" />
	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="<?php echo base_url('assets/'); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/'); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/landing'); ?>card.css" rel="stylesheet" type="text/css" />
	<style>
		/* Contact Section
		--------------------------------*/
		#contact {
			background: #fff;
		}

		#contact .info {
			color: #222;
		}

		#contact .info i {
			font-size: 32px;
			color: #14263c;
			float: left;
			line-height: 0;
		}

		#contact .info p {
			padding: 0 0 10px 50px;
			margin-bottom: 20px;
			line-height: 22px;
			font-size: 14px;
		}

		#contact .info .email p {
			padding-top: 5px;
		}

		#contact .social-links {
			padding: 20px 0;
		}

		#contact .social-links a {
			font-size: 18px;
			display: inline-block;
			background: #14263c;
			color: #fff;
			line-height: 1;
			padding: 6px 0 8px 0;
			border-radius: 50%;
			text-align: center;
			width: 36px;
			height: 36px;
			transition: 0.3s;
		}

		#contact .social-links a:hover {
			background: #019ef7;
			color: #fff;
		}

		#contact .php-email-form .validate {
			display: none;
			color: red;
			margin: 0 0 15px 0;
			font-weight: 400;
			font-size: 13px;
		}

		#contact .php-email-form .error-message {
			display: none;
			color: #fff;
			background: #ed3c0d;
			text-align: left;
			padding: 15px;
			font-weight: 600;
		}

		#contact .php-email-form .error-message br+br {
			margin-top: 25px;
		}

		#contact .php-email-form .sent-message {
			display: none;
			color: #fff;
			background: #18d26e;
			text-align: center;
			padding: 15px;
			font-weight: 600;
		}

		#contact .php-email-form .loading {
			display: none;
			background: #fff;
			text-align: center;
			padding: 15px;
		}

		#contact .php-email-form .loading:before {
			content: "";
			display: inline-block;
			border-radius: 50%;
			width: 24px;
			height: 24px;
			margin: 0 10px -6px 0;
			border: 3px solid #18d26e;
			border-top-color: #eee;
			animation: animate-loading 1s linear infinite;
		}

		#contact .php-email-form input,
		#contact .php-email-form textarea {
			border-radius: 0;
			box-shadow: none;
			font-size: 14px;
		}

		#contact .php-email-form input:focus,
		#contact .php-email-form textarea:focus {
			border-color: #71c55d;
		}

		#contact .php-email-form input {
			padding: 10px 15px;
		}

		#contact .php-email-form textarea {
			padding: 12px 15px;
		}

		#contact .php-email-form button[type=submit] {
			background: #14263c;
			border-radius: 10px;
			border: 0;
			padding: 10px 24px;
			color: #fff;
			transition: 0.4s;
		}

		#contact .php-email-form button[type=submit]:hover {
			background: #1e3755;
		}

		.social-links i {
			color: white;
		}

		@keyframes animate-loading {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		.section-title .header-contact {
			font-size: 30px;
			padding-bottom: 30px;
			color: #027a64;
			font-family: Arial, Helvetica, sans-serif;

		}

		#sent-notification {
			font-size: 15px;
			display: none;
			color: #ffffff;
			/* Warna notifikasi jika pesan berhasil dikirim */
			text-align: center;
			background-color: #79d465;
			padding: 10px;
		}
	</style>
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-white position-relative app-blank">
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
		<!--begin::Header Section-->
		<div class="mb-0" id="home">
			<!--begin::Wrapper-->
			<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
				<!--begin::Header-->
				<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex align-items-center justify-content-between">
							<!--begin::Logo-->
							<div class="d-flex align-items-center flex-equal">
								<!--begin::Mobile menu toggle-->
								<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
									<i class="ki-duotone ki-abstract-14 fs-2hx">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</button>
								<!--end::Mobile menu toggle-->
								<!--begin::Logo image-->
								<a href="../../demo1/dist/landing.html">
									<img alt="Logo" src="<?php echo base_url('assets/landing/'); ?>logokabupaten.png" class="logo-default h-25px h-lg-65px" />
									<img alt="Logo" src="<?php echo base_url('assets/landing/'); ?>logokabupaten.png" class="logo-sticky h-40px h-lg-60px" />
								</a>
								<!--end::Logo image-->
							</div>
							<!--end::Logo-->
							<!--begin::Menu wrapper-->
							<div class="d-lg-block" id="kt_header_nav_wrapper">
								<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
									<!--begin::Menu-->
									<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#home" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#about" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">About</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pelacakberkas" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Pelacak Berkas</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#videotutor" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Video Tutorial</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#kkpritr" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">KKPR & ITR</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item">
											<!--begin::Menu link-->
											<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="<?php echo base_url('User'); ?>" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Halaman Utama</a>
											<!--end::Menu link-->
										</div>
										<!--end::Menu item-->
										<!--User account-->
										<div class="app-navbar">
											<div class="app-navbar-item ms-10 me-6" id="kt_header_user_menu_toggle">
												<!--User avatar-->
												<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
													<img class="symbol symbol-35px"  src="<?= base_url('assets/') ?>assets/media/svg/avatars/blank.svg" alt="user" />
												</div>
												<!--User account menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
													<div class="menu-item px-3">
														<div class="menu-content d-flex align-items-center px-3">
															<!--User avatar-->
															<div class="symbol symbol-50px me-5">
																<?php if ($this->session->userdata('profile')) { ?>
																	<img alt="Logo" src="<?= base_url('assets/') ?>image/profile/<?= $profile->profile ?>" />
																<?php } else { ?>
																	<img alt="Logo" src="<?= base_url('assets/') ?>assets/media/svg/avatars/blank.svg" />
																<?php } ?>
															</div>
															<!--Username-->
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
														</div>
													</div>
													<!--User account menu item-->
													<div class="separator my-2"></div>
													<div class="menu-item px-5">
														<a href="../dist/authentication/layouts/corporate/sign-in.html" class="menu-link px-5">Edit Profile</a>
													</div>
													<div class="menu-item px-5">
													<a href="#" class="menu-link px-5" data-bs-toggle="modal" data-bs-target="#kt_modal_invite_friends">LogOut</a>
													</div>
													<!--end User account menu item-->
												</div>
												<!--end User account menu-->
											</div>
										</div>
									</div>
									<!--end::Menu-->
								</div>
							</div>
							<!--end::Menu wrapper-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Landing hero-->
				<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
					<!--begin::Heading-->
					<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
						<!--begin::Title-->
						<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15"><b>Membangun Masa Depan yang Lebih Baik
								<br />bersama</b>
							<span style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text"><b>DPK-PCK</b></span>
							</span>
						</h1>
						<!--end::Title-->
					</div>
					<!--end::Heading-->


				</div>
				<!--end::Landing hero-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color mb-10 mb-lg-20" id="about">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Header Section-->
		<!--begin::About Section-->
		<div class="mb-n10 mb-lg-n50 z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Heading-->
				<div class="text-center mb-17">
					<!--begin::Title-->
					<h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">
						About</h3>
					<!--end::Title-->
					<!--begin::Text-->
					<div class="fs-5 text-muted fw-bold">DPK-PCK
						<br />Dinas Perumahan, Kawasan Permukiman dan Cipta Karya
					</div>
					<!--end::Text-->
				</div>
				<!--end::Heading-->
				<!--begin::Row-->
				<div class="row w-100 gy-10 mb-md-20">
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="asset-dpk1.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
								<!--end::Badge-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold mb-20 fs-6 fs-lg-5 text-muted">Pelaksanaan kebijakan teknis <br> perencanaan, pembangunan, operasi
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-10 mb-md-0">
							<!--begin::Illustration-->
							<img src="asset-dpk2.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
								<!--end::Badge-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold mb-20 fs-6 fs-lg-5 text-muted">Pemeliharaan, pemantauan <br> dan evaluasi pengelolaan sarana <br> dan prasarana
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="col-md-4 px-5">
						<!--begin::Story-->
						<div class="text-center mb-20 mb-md-0">
							<!--begin::Illustration-->
							<img src="asset-dpk3.png" class="mh-125px mb-9" alt="" />
							<!--end::Illustration-->
							<!--begin::Heading-->
							<div class="d-flex flex-center mb-5">
								<!--begin::Badge-->
								<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
								<!--end::Badge-->
							</div>
							<!--end::Heading-->
							<!--begin::Description-->
							<div class="fw-semibold mb-20 fs-6 fs-lg-5 text-muted">Utilitas umum perumahan dan <br> kawasan permukiman sesuai luasan <br> wilayah yang ditetapkan
							</div>
							<!--end::Description-->
						</div>
						<!--end::Story-->
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::About Section-->
		<!--begin::Statistics Section-->
		<div class="mt-sm-n10">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color" id="pelacakberkas">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="pb-15 pt-18 landing-dark-bg">
				<!--begin::Container-->
				<div class="d-flex flex-column container pt-lg-5">
					<!--begin::Heading-->
					<div class="mb-13 text-center">
						<h1 class="fs-2hx fw-bold text-white mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">Pelacak Berkas</h1>
						<div class="text-gray-600 fw-semibold fs-5">Jelajahi Arsipmu Disini
						</div>
					</div>
					<!--end::Heading-->
					<!--begin::card-->
					<div class="text-center" id="kt_pricing">
						<!--begin::Nav group-->
						<div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true" style="border: 1px dashed #2B4666;">
							<a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active" onclick="showContent('permohonan')" data-kt-plan="month">ITR</a>
							<a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3" onclick="showContent('minimarket')" data-kt-plan="annual">KKPR</a>
						</div>
						<!--end::Nav group-->
						<!--begin::Row-->
						<div class="d-flex justify-content-center row g-10">
							<!--begin::Col-->
							<div class="col-xl-5">
								<div class="h-100 align-items-center">
									<!--begin::Option-->
									<div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
										<!--begin::Tab Content-->
										<div class="tab-content">
											<!--begin::Permohonan-->
											<div class="tab-pane fade show active" id="permohonanTab">
												<div class="m-0">
													<!--begin::Wrapper-->
													<div class="d-flex align-items-sm-center mb-5">
														<!--begin::Symbol-->
														<div class="symbol symbol-45px me-4">
															<span class="symbol-label bg-primary">
																<i class="ki-duotone ki-airplane-square text-inverse-primary fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-row-fluid flex-wrap">
															<div class="flex-grow-1 me-2">
																<a href="#" class="text-gray-400 fs-6 fw-semibold">Permohonan</a>
																<span class="text-gray-800 fw-bold d-block fs-4">No.123</span>
															</div>
															<span class="badge badge-lg badge-light-success fw-bold my-2">Diterima</span>
														</div>
														<!--end::Section-->
													</div>
													<!--end::Wrapper-->
													<!--begin::Timeline-->
													<div class="timeline">
														<!--begin::Timeline item-->
														<div class="timeline-item align-items-center mb-7">
															<!--begin::Timeline line-->
															<div class="timeline-line w-40px mt-6 mb-n12"></div>
															<!--end::Timeline line-->
															<!--begin::Timeline icon-->
															<div class="timeline-icon" style="margin-left: 11px">
																<i class="ki-duotone ki-cd fs-2 text-danger">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</div>
															<!--end::Timeline icon-->
															<!--begin::Timeline content-->
															<div class="timeline-content m-0">
																<!--begin::Title-->
																<span class="fs-6 text-gray-400 fw-semibold d-block">Diterima Staff</span>
																<!--end::Title-->
																<!--begin::Title-->
																<span class="fs-6 fw-bold text-gray-800">Muhammad Gilang Ramadhan, 13-02-2023</span>
																<!--end::Title-->
															</div>
															<!--end::Timeline content-->
														</div>
														<!--end::Timeline item-->
														<!--begin::Timeline item-->
														<div class="timeline-item align-items-center">
															<!--begin::Timeline line-->
															<div class="timeline-line w-40px"></div>
															<!--end::Timeline line-->
															<!--begin::Timeline icon-->
															<div class="timeline-icon" style="margin-left: 11px">
																<i class="ki-duotone ki-geolocation fs-2 text-info">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</div>
															<!--end::Timeline icon-->
															<!--begin::Timeline content-->
															<div class="timeline-content m-0">
																<!--begin::Title-->
																<span class="fs-6 text-gray-400 fw-semibold d-block">Acc Tahap 1</span>
																<!--end::Title-->
																<!--begin::Title-->
																<span class="fs-6 fw-bold text-gray-800">Sudiono, 15-03-2023</span>
																<!--end::Title-->
															</div>
															<!--end::Timeline content-->
														</div>
														<!--end::Timeline item-->
														<!--begin::Timeline item-->
														<div class="timeline-item align-items-center">
															<!--begin::Timeline line-->
															<div class="timeline-line w-40px"></div>
															<!--end::Timeline line-->
															<!--begin::Timeline icon-->
															<div class="timeline-icon" style="margin-left: 11px">
																<i class="ki-duotone ki-geolocation fs-2 text-info">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</div>
															<!--end::Timeline icon-->
															<!--begin::Timeline content-->
															<div class="timeline-content m-0">
																<!--begin::Title-->
																<span class="fs-6 text-gray-400 fw-semibold d-block">Acc Tahap 2</span>
																<!--end::Title-->
																<!--begin::Title-->
																<span class="fs-6 fw-bold text-gray-800">Prayitno, 19-03-2023</span>
																<!--end::Title-->
															</div>
															<!--end::Timeline content-->
														</div>
														<!--end::Timeline item-->
													</div>
													<!--end::Timeline-->
												</div>
												<!--begin::Separator-->
												<div class="separator separator-dashed my-6"></div>
												<!--end::Separator-->
											</div>
											<!--end::Permohonan-->
											<!--begin::Minimarket-->
											<div class="tab-pane" id="minimarketTab">
												<div class="m-0">
													<!--begin::Wrapper-->
													<div class="d-flex align-items-sm-center mb-5">
														<!--begin::Symbol-->
														<div class="symbol symbol-45px me-4">
															<span class="symbol-label bg-primary">
																<i class="ki-duotone ki-airplane-square text-inverse-primary fs-1">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</span>
														</div>
														<!--end::Symbol-->
														<!--begin::Section-->
														<div class="d-flex align-items-center flex-row-fluid flex-wrap">
															<div class="flex-grow-1 me-2">
																<a href="#" class="text-gray-400 fs-6 fw-semibold">Minimarket</a>
																<span class="text-gray-800 fw-bold d-block fs-4">No.123</span>
															</div>
															<span class="badge badge-lg badge-light-success fw-bold my-2">Diterima</span>
														</div>
														<!--end::Section-->
													</div>
													<!--end::Wrapper-->
													<!--begin::Timeline-->
													<div class="timeline">
														<!--begin::Timeline item-->
														<div class="timeline-item align-items-center mb-7">
															<!--begin::Timeline line-->
															<div class="timeline-line w-40px mt-6 mb-n12"></div>
															<!--end::Timeline line-->
															<!--begin::Timeline icon-->
															<div class="timeline-icon" style="margin-left: 11px">
																<i class="ki-duotone ki-cd fs-2 text-danger">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</div>
															<!--end::Timeline icon-->
															<!--begin::Timeline content-->
															<div class="timeline-content m-0">
																<!--begin::Title-->
																<span class="fs-6 text-gray-400 fw-semibold d-block">Diterima Staff</span>
																<!--end::Title-->
																<!--begin::Title-->
																<span class="fs-6 fw-bold text-gray-800">Muhammad Rohmat Ramadhan, 13-02-2023</span>
																<!--end::Title-->
															</div>
															<!--end::Timeline content-->
														</div>
														<!--end::Timeline item-->
														<!--begin::Timeline item-->
														<div class="timeline-item align-items-center">
															<!--begin::Timeline line-->
															<div class="timeline-line w-40px"></div>
															<!--end::Timeline line-->
															<!--begin::Timeline icon-->
															<div class="timeline-icon" style="margin-left: 11px">
																<i class="ki-duotone ki-geolocation fs-2 text-info">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</div>
															<!--end::Timeline icon-->
															<!--begin::Timeline content-->
															<div class="timeline-content m-0">
																<!--begin::Title-->
																<span class="fs-6 text-gray-400 fw-semibold d-block">Acc Tahap 1</span>
																<!--end::Title-->
																<!--begin::Title-->
																<span class="fs-6 fw-bold text-gray-800">Sudiono, 15-03-2023</span>
																<!--end::Title-->
															</div>
															<!--end::Timeline content-->
														</div>
														<!--end::Timeline item-->
														<!--begin::Timeline item-->
														<div class="timeline-item align-items-center">
															<!--begin::Timeline line-->
															<div class="timeline-line w-40px"></div>
															<!--end::Timeline line-->
															<!--begin::Timeline icon-->
															<div class="timeline-icon" style="margin-left: 11px">
																<i class="ki-duotone ki-geolocation fs-2 text-info">
																	<span class="path1"></span>
																	<span class="path2"></span>
																</i>
															</div>
															<!--end::Timeline icon-->
															<!--begin::Timeline content-->
															<div class="timeline-content m-0">
																<!--begin::Title-->
																<span class="fs-6 text-gray-400 fw-semibold d-block">Acc Tahap 2</span>
																<!--end::Title-->
																<!--begin::Title-->
																<span class="fs-6 fw-bold text-gray-800">Prayitno, 19-03-2023</span>
																<!--end::Title-->
															</div>
															<!--end::Timeline content-->
														</div>
														<!--end::Timeline item-->
													</div>
													<!--end::Timeline-->
												</div>
												<!--begin::Separator-->
												<div class="separator separator-dashed my-6"></div>
												<!--end::Separator-->
											</div>
											<!--end::Minimarket-->
										</div>
										<!--end::Tab Content-->
									</div>
									<!--end::Features-->
								</div>
								<!--end::Option-->
							</div>
						</div>
						<!--end::Row-->
					</div>
					<!--end::card-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color" id="videotutor">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Statistics Section-->
		<!--begin::Video Section-->
		<div class="mb-lg-n15 position-relative z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Card-->
				<div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
					<!--begin::Card body-->
					<div class="card-body p-lg-20">
						<!--begin::Heading-->
						<div class="text-center mb-5 mb-lg-10">
							<!--begin::Title-->
							<h3 class="fs-2hx text-dark mb-5" data-kt-scroll-offset="{default: 100, lg: 250}">Video Tutorial</h3>
							<!--end::Title-->
							<!-- begin content -->
							<section id="panduan" class="mt-20">
								<div class="container-fluid" data-aos="fade-up">
									<div class="d-flex justify-content-center">
										<iframe width="560" height="315" src="https://www.youtube.com/embed/videoseries?si=smd-zwEXpGxLl1SY&amp;list=PLVA91M9nFgiyTfSrQctnx2vBdnp7IRsYJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" class="rounded" allowfullscreen></iframe>
									</div>
								</div>
							</section>
							<!-- end content -->
						</div>
						<!--end::Heading-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Video Section-->


		<!--begin::Pricing Section-->
		<div class="mt-sm-n20">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="py-20 landing-dark-bg">
				<!--begin::Container-->
				<div class="py-20 landing-dark-bg" id="kkpritr">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Plans-->
						<div class="d-flex flex-column container pt-lg-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="fs-2hx fw-bold text-white mb-5" data-kt-scroll-offset="{default: 100, lg: 150}">Penjelasan KKPR & ITR</h1>
								<div class="text-gray-600 fw-semibold fs-5">Mengenal Lebih Dekat tentang
									<br />Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR) dan Informasi Tata Ruang (ITR)
								</div>
							</div>
							<!--end::Heading-->
							<!--begin::Pricing-->
							<div class="text-center" id="kt_pricing">
								<!--begin::Row-->
								<div class="row g-10 justify-content-center"> <!-- Tambahkan class justify-content-center di sini -->
									<!--begin::Col-->
									<div class="col-xl-4">
										<div class="d-flex h-100 align-items-center">
											<!--begin::Option-->
											<div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-9 px-9 mx-auto"> <!-- Tambahkan class mx-auto di sini -->
												<!--begin::Heading-->
												<div class="mb-1 text-center">
													<!--begin::Title-->
													<i class="icon bi bi-building mb-5"></i>
													<h1 class="text-dark mb-1 fw-boldest">KKPR</h1>
													<!--end::Title-->
												</div>
												<!--end::Heading-->
												<!--begin::Description-->
												<div class="text-gray-500 fw-semibold mb-3 fs-6">Kesesuaian Kegiatan Pemanfaatan Ruang</div>
												<!--end::Description-->
												<!--begin::Features-->
												<div class="w-100">
													<div class="d-flex flex-stack mb-5 text-wrapper">
														<p class="fw-semibold fs-5 text-gray-900 pe-3">( KKPR ) adalah istilah yang berkaitan dengan perencanaan tata ruang dan tata kota, terutama dalam konteks perizinan dan penggunaan lahan. Hal ini mengacu pada proses penilaian dan pengaturan penggunaan lahan serta aktivitas yang sesuai dengan rencana tata ruang dan peraturan yang ada di suatu wilayah.</p>
													</div>
													<!--end::Item-->
													<!--begin::Action-->
													<a href="<?php echo base_url('Filter.html'); ?>" class="btn btn-primary ">Isi Formulir</a>
													<!--end::Action-->
												</div>
												<!--end::Features-->
											</div>
											<!--end::Option-->
										</div>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">
										<div class="d-flex h-100 align-items-center">
											<!--begin::Option-->
											<div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-9 px-9 mx-auto"> <!-- Tambahkan class mx-auto di sini -->
												<!--begin::Heading-->
												<div class="mb-1 text-center">
													<!--begin::Title-->
													<i class="icon bi bi-map mb-5"></i>
													<h1 class="text-dark mb-1 fw-boldest">ITR</h1>
													<!--end::Title-->
												</div>
												<!--end::Heading-->
												<!--begin::Description-->
												<div class="text-gray-500 fw-semibold mb-3 fs-6">Informasi Tata Ruang</div>
												<!--end::Description-->
												<!--begin::Features-->
												<div class="w-100">
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<p class="fw-semibold fs-5 text-gray-900 pe-3">( ITR ) adalah kumpulan data dan informasi yang digunakan dalam perencanaan dan pengelolaan tata ruang suatu wilayah. ITR berfungsi sebagai dasar informasi untuk mengambil keputusan terkait penggunaan lahan, perencanaan pembangunan, pelestarian lingkungan, dan manajemen sumber daya alam.</p>
													</div>
													<!--end::Item-->
													<a href="<?php echo base_url('Filter.html'); ?>" class="button-itr btn btn-primary">Isi Formulir</a>
													<!--end::Action-->
												</div>
												<!--end::Features-->
											</div>
											<!--end::Option-->
										</div>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Pricing-->

						</div>
						<!--end::Plans-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
			<!--begin::Curve bottom-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve bottom-->
		</div>
		<!--end::Pricing Section-->



		<!--begin::Testimonials Section-->
		<div class="mt-20 mb-n20 position-relative z-index-2">
			<!--begin::Container-->
			<div class="container">
				<!--begin::Row-->
				<div class="row g-lg-10 mb-10 mb-lg-20">
					<!-- ======= Contact Section ======= -->
					<section id="contact" class="padd-section">

						<div class="container" data-aos="fade-up">
							<div class="text-center mb-17">
								<!--begin::Title-->
								<h3 class="fs-2hx text-dark mb-5" id="contact" data-kt-scroll-offset="{default: 125, lg: 150}">Contact Us</h3>
								<!--end::Title-->
								<!--begin::Description-->
								<div class="fs-5 text-muted fw-bold">Informasi Kontak Kami
								</div>
								<!--end::Description-->
							</div>

							<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">

								<div class="col-lg-3 col-md-4">

									<div class="info">
										<div>
											<i class="bi bi-geo-alt"></i>
											<p>Jl. Trunojoyo No.6, Penarukan, Kec. Kepanjen, Kabupaten Malang, JawaTimur 65163</p>
										</div>

										<div class="email">
											<i class="bi bi-envelope"></i>
											<p>dpkpck@gmail.com</p>
										</div>

										<div>
											<i class="bi bi-phone"></i>
											<p>+62 896 2233 4456</p>
										</div>
									</div>

									<div class="social-links">
										<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
										<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
										<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
										<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
									</div>

								</div>

								<div class="col-lg-5 col-md-8">
									<div class="form">
										<form action="forms/contact.php" method="post" role="form" class="php-email-form">
											<div class="form-group">
												<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
											</div>
											<div class="form-group mt-3">
												<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
											</div>
											<div class="form-group mt-3">
												<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
											</div>
											<div class="form-group mt-3">
												<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
											</div>
											<div class="my-3">
												<div class="loading">Loading</div>
												<div class="error-message"></div>
												<div class="sent-message">Your message has been sent. Thank you!</div>
												<div class="sent-notification" id="sent-notification">Your message has been sent.</div>
											</div>
											<div class="text-center"><button type="submit">Send Message</button></div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</section><!-- End Contact Section -->
				</div>
				<!--end::Row-->
				<!--begin::Highlight-->
				<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
					<!--begin::Content-->
					<div class="my-2 me-5">
						<!--begin::Title-->
						<div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">DPK-PCK:
							<span class="fw-normal">Mewujudkan Impian Hunian yang Berkualitas</span>
						</div>
						<!--end::Title-->
						<!--begin::Description-->
						<div class="fs-6 fs-lg-5 text-white fw-semibold opacity-75">Inovasi dalam Pengembangan Kawasan Permukiman</div>
						<!--end::Description-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Highlight-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Testimonials Section-->
		<!--begin::Footer Section-->
		<div class="mb-0">
			<!--begin::Curve top-->
			<div class="landing-curve landing-dark-color">
				<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
				</svg>
			</div>
			<!--end::Curve top-->
			<!--begin::Wrapper-->
			<div class="landing-dark-bg pt-20">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
						<!--begin::Copyright-->
						<div class="d-flex align-items-center order-2 order-md-1">
							<!--begin::Logo-->
							<a href="../../demo1/dist/landing.html">
								<img alt="Logo" src="<?php echo base_url('assets/landing/'); ?>logo-text-dpk.png" class="h-20px h-md-75px" />
							</a>
							<!--end::Logo image-->
						</div>
						<!--end::Copyright-->
						<!--begin::Menu-->
						<div class="menu menu-gray-600 menu-hover-primary fw-semibold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
							<span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://keenthemes.com">&copy;
								Copyright RN Billing Service. All Rights Reserved. Tiga Pilar Garuda</span>
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Footer Section-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->
	</div>
	<!--end::Root-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-duotone ki-arrow-up">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>
	<!--end::Scrolltop-->
	<!--begin::Javascript-->
	<!-- <script>
		var hostUrl = "assets/";
	</script> -->
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="<?php echo base_url('assets/'); ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url('assets/'); ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="<?php echo base_url('assets/'); ?>assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
	<script src="<?php echo base_url('assets/'); ?>assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="<?php echo base_url('assets/'); ?>assets/js/custom/landing.js"></script>
	<script src="<?php echo base_url('assets/'); ?>assets/js/custom/pages/pricing/general.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->



	<script>
		function showContent(tabName) {
			const permohonanTab = document.getElementById("permohonanTab");
			const minimarketTab = document.getElementById("minimarketTab");

			if (tabName === 'permohonan') {
				permohonanTab.style.display = "block";
				minimarketTab.style.display = "none";
			} else if (tabName === 'minimarket') {
				permohonanTab.style.display = "none";
				minimarketTab.style.display = "block";
			}
		}
	</script>
</body>
<!--end::Body-->

</html>