<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geojson extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Geojson_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('converter/index');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
    }

    public function uploadGeoJSON()
    {
        // Ambil URL dari formulir atau input
        $raw_url = $this->input->post('geojsonFile');

        // Bersihkan URL
        $clean_url = url_title($raw_url, 'dash', true);

        // Memanggil model untuk mengunggah file
        if ($this->Geojson_model->Uploadfile($clean_url) == false) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Data tersimpan');
            redirect('Geojson');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan'); // Mengubah menjadi 'error'
            $info = array('hasil' => 'FALSE', 'pesan' => 'Data tidak tersimpan');
            redirect('Geojson'); // Atau tambahkan pesan error khusus untuk ditampilkan
        }
    }



    // private function convertGeoJSONToSHP($targetPath)
    // {
    //     error_reporting(E_ALL);
    //     ini_set("display_errors", 1);
    //     // Path to save the converted Shapefile
    //     $shpFilePath = 'save_shp';

    //     $command = "python " . "python_scripts/convert_geojson_to_shp.py $targetPath $shpFilePath";

    //     $output = exec($command);

    //     echo "Conversion output: <pre>$output</pre>";
    //     print_r($output);
    //     var_dump($output);
    // }
}
