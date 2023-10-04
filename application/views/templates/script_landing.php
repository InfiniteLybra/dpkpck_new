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
                    <i class="ki-duotone ki-cross-square fs-2">
                        <i class="path1"></i>
                        <i class="path2"></i>
                    </i>
                </a>
                <a href="<?= base_url('Auth/logout') ?>" class="btn btn-success btn-sm pt-2 pb-2">
                    <i class="ki-duotone ki-entrance-left fs-2">
                        <i class="path1"></i>
                        <i class="path2"></i>
                    </i>
                </a>
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Invite Friend-->