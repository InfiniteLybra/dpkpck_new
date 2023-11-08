<div class="content-wrapper">



    <!-- Begin Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Formulir /</span> Converter GeoJSON
        </h4>

        <!-- CONTENT -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Form untuk Upload File GeoJSON</h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <form action="<?php echo base_url('Geojson/uploadGeoJSON'); ?>" method="post" enctype="multipart/form-data">
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Pilih file GeoJSON</label>
                                <input type="file" class="form-control" name="geojsonFile" id="geojsonFile" accept=".geojson" />
                                <!-- <input type="submit" value="Upload" class="btn btn-primary fw-bold flex-shrink-0"> -->
                            </div>
                            <button type="submit" value="Upload" class="btn btn-primary acc-button mt-3">Upload</button>
                            <!-- <label for="geojsonFile">Masukan File GeoJson yang sudah didownload disini.</label> -->
                            <!-- <div class="d-flex mb-3">
                                <input type="file" id="geojsonFile" name="geojsonFile" accept=".geojson" class="form-control flex-grow-1">
                                <input type="submit" value="Upload" class="btn btn-primary fw-bold flex-shrink-0">
                            </div> -->
                            <!-- <small>Masukan File GeoJson yang sudah didownload disini.</small> -->
                        </form>

                        <!-- Tampilkan tautan ke file SHP yang telah dikonversi -->
                        <div class="m-1" id="fileSHPContainer">
                            <?php
                            $converted_file_path = $this->session->userdata('converted_file_path');
                            if (!empty($converted_file_path)) {
                                echo '<h6 class="mb-0">File SHP yang telah dikonversi: <a href="' . base_url() . $converted_file_path . '" download>Unduh File SHP</a></h6>';
                            } else {
                                echo '<h6 class="mb-0">Tidak ada file yang telah dikonversi.</h6>';
                            }
                            ?>
                        </div>

                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>
    </div>