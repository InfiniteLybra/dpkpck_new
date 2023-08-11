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
        $this->load->view('templates/header');
        $this->load->view('shp_map/map');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('shp_map/script');
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
    public function tes()
    {
        $this->load->view('map/tes');
    }
    public function meter()
    {
        $this->load->view('map/meter');
    }
}
