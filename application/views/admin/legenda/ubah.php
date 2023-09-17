<div class="container">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <!-- <div class="card-header">
                    Tambah Data Legenda
                </div> -->
                <div class="card-body">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('legenda/ubahData'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $legenda['id_legenda'] ?>">
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_legenda">Id Legenda<span class="required"></span> </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" name="id_legenda" class="form-control" id="id_legenda" value="<?= $legenda['id_legenda']; ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('id_legenda'); ?></small>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="type">Type<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" name="type" class="form-control" id="type" value="<?= $legenda['type']; ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('type'); ?></small>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="legenda">Legenda<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" name="legenda" class="form-control" id="legenda" value="<?= $legenda['legenda']; ?>">
                            </div>
                            <small class="form-text text-danger"><?= form_error('legenda'); ?></small>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="foto">Foto<span class="required"></span></label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="file" id="foto" name="foto" class="form-control" value="<?= $legenda['foto']; ?>">
                            </div>
                            <div class="row mt-5">
                                <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>