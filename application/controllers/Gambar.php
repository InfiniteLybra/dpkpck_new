<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model("Model_DPKCPK");
    }
    public function index()
    {
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/p', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "5", "5", "5", "5", "", "", "", "", "", "", "", "", "", "", "", "a4");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
        // $this->load->view('pdf/p');
    }
    public function tes()
    {
        $this->load->view('pdf/p');
    }
}
