<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("Model_DPKCPK");
    }
    public function index()
    {
        $geojson = $this->input->get('geojson');
        $data = array(
            'geojson' => $geojson
        );
        $id_user = $this->session->userdata('id_user');
        $data['cek_shp'] = $this->db->query("SELECT * FROM shp WHERE id_user = '$id_user'")->result();
        $data['shp'] = $this->db->query("SELECT * FROM shp WHERE id_user = '$id_user'")->row();
        $this->load->view('templates/header');
        $this->load->view('shp_map/map', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('shp_map/script', $data);
    }
    public function tes()
    {
        $id_user = $this->session->userdata('id_user');
        $data['cek_shp'] = $this->db->query("SELECT * FROM shp WHERE id_user = '$id_user'")->result();
        $data['shp'] = $this->db->query("SELECT * FROM shp WHERE id_user = '$id_user'")->row();
        $this->load->view('templates/header');
        $this->load->view('shp_map/tes', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('shp_map/script_tes', $data);
    }
    public function proses_shp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $config['upload_path'] = 'saveshp';
            $config['allowed_types'] = 'zip';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('shp_file')) {
                $upload_data = $this->upload->data();
                $zip_path = $upload_data['full_path'];

                $python_script = "python_scripts/convert_shp_to_geojson.py";
                $command = "python $python_script $zip_path";

                $geojson = shell_exec($command);
                // var_dump(urlencode($geojson));die;
                // $data = array(
                //     'geojson' => $geojson
                // );
                redirect('Map/index?geojson=' . urlencode($geojson), 'refresh');
                // var_dump($data);die;
                // $this->load->view('shp_map_new/map', $data);
                // redirect('Map/index2', 'refresh');

            } else {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('Map', $error);
            }
        }
    }
    public function hapus_shp($id)
    {
        $file = $this->db->query("SELECT * FROM shp WHERE id = '$id'")->row();
        $query = $this->db->query("DELETE FROM shp WHERE id = '$id'");
        if ($query) {
            if (!empty($file->shp)) {
                $file_path = './assets_dokumen/shp/' . $file->shp;
                if (file_exists($file_path)) {
                    unlink($file_path); // Hapus file foto
                }
            }
        }
        redirect('Map');
    }
    public function hapus_tes($id)
    {
        $file = $this->db->query("SELECT * FROM shp WHERE id = '$id'")->row();
        $query = $this->db->query("DELETE FROM shp WHERE id = '$id'");
        if ($query) {
            if (!empty($file->shp)) {
                $file_path = './assets_dokumen/shp/' . $file->shp;
                if (file_exists($file_path)) {
                    unlink($file_path); // Hapus file foto
                }
            }
        }
        redirect('Map/tes');
    }
    public function proses_tes()
    {
        $config['upload_path']          = './assets_dokumen/shp';
        $config['allowed_types']        = 'zip';
        $config['max_size']             = 10240; //2MB
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['shp']['name'])) {
            $this->upload->do_upload('shp');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }
        $id_user = $this->session->userdata('id_user');
        $this->db->query("INSERT INTO shp (id_user,shp) VALUES('$id_user','$file1') ");
        redirect('Map/tes');
    }
    public function index1()
    {
        $data['p'] = '';
        $this->load->view('templates/header');
        $this->load->view('map/map',  $data);
        $this->load->view('templates/footer');
        $this->load->view('map/script_map');
        $this->load->view('templates/footScript');
    }
    public function polygon()
    {
        $this->load->view('templates/header');
        $this->load->view('polygon_map/map');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('polygon_map/script');
    }
    public function polygon_new()
    {
        $this->load->view('templates/header');
        $this->load->view('polygon_map_new/index');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('polygon_map_new/script');
    }
    public function polygon_baru()
    {
        $data['shp'] = $this->db->query("SELECT * FROM shp WHERE id = '0'")->row();
        $this->load->view('templates/header');
        $this->load->view('polygon_map/baru', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('polygon_map/script_baru');
    }
    function cek1()
    {
        $this->load->view('map/tes_koor');
    }
}
