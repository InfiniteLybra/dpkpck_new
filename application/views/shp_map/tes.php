<!DOCTYPE html>
<html lang="en">

<style>
    #map {
        height: 100vh;
        width: 100%;
    }

    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Map

        </div>
    </div>
    <div class="card-body">
    <form method="POST" action="<?php echo base_url('Map/proses_tes'); ?>" enctype="multipart/form-data">
        <?php
            if($cek_shp){
            }else{
        ?>
        <div class="d-flex mb-3">
            <input type="file" name="shp" class="form-control flex-grow-1" value="">
            <button type="submit" class="btn btn-primary fw-bold flex-shrink-0">Upload</button>
        </div>
        <?php }?>
        <?php 
            if($cek_shp){
                foreach($cek_shp as $s){
        ?>
        <div class="d-flex mb-3">
            <input type="text" class="form-control flex-grow-1" value="<?= $s->shp?>" readonly>
            <a href="<?php echo base_url('Map/hapus_tes/');?><?= $s->id?>" class="btn btn-danger fw-bold flex-shrink-0">Hapus</a>
        </div>
        <?php }}?>
    </form>
        <div id="map" style="
        height: 500px;
        min-width: 300px;
        width: auto;
        max-width: 1400px;
        "></div>
    </div>