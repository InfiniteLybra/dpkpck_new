<?php

class Geojson_model extends CI_Model
{
    public function Uploadfile()
    {
        $config['upload_path'] = 'geojson_file';
        $config['allowed_types'] = 'geojson';
        $config['max_size'] = 2048; // Ukuran maksimum 2MB (dapat disesuaikan)

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('geojsonFile')) {
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];  // Dapatkan nama file yang diunggah
            $file_path = $upload_data['full_path'];

            // Konstruksi jalur
            $geojson_file_path = 'geojson_file/' . $file_name; // Gabungkan nama file dengan jalur
            $shp_file_path = 'save_shp/' . pathinfo($file_name, PATHINFO_FILENAME) . '.zip'; // Konstruksi jalur file SHP

            // Lakukan konversi GeoJSON ke SHP
            $command = "python python_scripts/convert_geojson_to_shp.py $geojson_file_path $shp_file_path";
            $output = exec($command);
            echo "Hasil konversi: <pre>$output</pre>";
            $this->session->set_userdata('converted_file_path', $shp_file_path);

            echo 'File GeoJSON berhasil diunggah: ' . $file_name;
        } else {
            echo 'Terjadi kesalahan saat mengunggah file GeoJSON: ' . $this->upload->display_errors();
        }
    }
}
