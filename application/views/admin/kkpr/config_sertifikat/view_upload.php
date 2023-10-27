<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> </h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                            <label>Converter SHP To Koordinat</label>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->

                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!-- begin::Table -->
                        <label>Masukan File SHP yang akan dirubah menjadi koordinat disini</label>
                        <form method="POST" action="<?php echo base_url('Kkpr/upload_zip_file/' . $id) ?>" enctype="multipart/form-data">
                            <div class="d-flex mb-3">
                                <input type="file" name="zip_file" class="form-control flex-grow-1">
                                <input type="submit" value="Upload ZIP" class="btn btn-primary fw-bold flex-shrink-0">
                            </div>
                        </form>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>
</div>