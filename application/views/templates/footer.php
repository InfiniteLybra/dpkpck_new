<!-- Modal Detail -->


<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<div id=" kt_scrolltop " class=" scrolltop " data-kt-scrolltop=" true ">
    <i class=" ki-duotone ki-arrow-up ">
        <span class=" path1 "></span>
        <span class=" path2 "></span>
    </i>
</div>
<!--end::Scrolltop-->
<!--begin::Modal - Invite Friends-->
<div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-450px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 pt-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-3">
                <div class="text-center mb-1">
                    <!--begin::Title-->
                    <h1 class="mb-3">Yakin ingin keluar?</h1>
                    <!--end::Title-->
                </div>
            </div>
            <div class="modal-footer pb-2 pt-2">
                <a data-bs-dismiss="modal" class="btn btn-danger btn-sm pt-2 pb-2 me-5">
                <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                </a>
                <a href="<?= base_url('Auth/logout') ?>" class="btn btn-success btn-sm pt-2 pb-2">
                    <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                </a>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Invite Friend-->