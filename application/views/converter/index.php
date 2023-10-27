<div class="content-wrapper">



    <!-- Begin Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Formulir /</span> Converter GeoJSON
        </h4>

        <!-- CONTENT -->
        <div class="row">
            <div class="col-12">
                <div class="card card-flush">
                    <div class="card-header">
                        <div class="card-title">
                            Converter GeoJson to SHP

                        </div>
                    </div>
                    <!--begin::Card body-->
                    <div class="card-body">

                        <form action="<?php echo base_url('Geojson/uploadGeoJSON'); ?>" method="post" enctype="multipart/form-data">
                            <label for="geojsonFile">Masukan File GeoJson yang sudah didownload disini.</label>
                            <div class="d-flex mb-3">
                                <input type="file" id="geojsonFile" name="geojsonFile" accept=".geojson" class="form-control flex-grow-1">
                                <input type="submit" value="Upload" class="btn btn-primary fw-bold flex-shrink-0">
                            </div>
                            <!-- <small>Masukan File GeoJson yang sudah didownload disini.</small> -->
                        </form>

                        <!-- Tampilkan tautan ke file SHP yang telah dikonversi -->
                        <?php
                        $converted_file_path = $this->session->userdata('converted_file_path');
                        if (!empty($converted_file_path)) {
                            echo 'File SHP yang telah dikonversi: <a href="' . base_url() . $converted_file_path . '" download>Unduh File SHP</a>';
                        } else {
                            echo 'Tidak ada file yang telah dikonversi.';
                        }
                        ?>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>