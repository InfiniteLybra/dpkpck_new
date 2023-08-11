<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model");
        // $this->load->model("Model_DPKCPK");
    }
    public function laporan_kkpr($id)
    {
        $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_peta WHERE id_permohonan = '$id'")->row(); 
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/kkpr/laporan', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "8", "8", "8", "8", "", "", "", "", "", "", "", "", "", "", "", "Folio");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
        // $this->load->view('pdf/p');
    }
    public function informasi_kkpr()
    {
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/kkpr/informasi', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "8", "8", "8", "8", "", "", "", "", "", "", "", "", "", "", "", "Folio");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function kesanggupan_kkpr()
    {
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/kkpr/kesanggupan', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "8", "8", "8", "8", "", "", "", "", "", "", "", "", "", "", "", "Folio");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
        // $this->load->view('pdf/kkpr/kesanggupan');
    }
    public function pemilik_lahan_itr()
    {
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/itr/pemilik_lahan', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "8", "8", "8", "8", "", "", "", "", "", "", "", "", "", "", "", "Folio");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
        // $this->load->view('pdf/p');

    }
    public function penerbitan_itr()
    {
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/itr/penerbitan', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "8", "8", "8", "8", "", "", "", "", "", "", "", "", "", "", "", "Folio");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function draf_peta($id)
    {
        $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_draft_peta WHERE id_permohonan = '$id'")->row(); 
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/draf_peta', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "8", "8", "8", "8", "", "", "", "", "", "", "", "", "", "", "", "Folio");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
    }
    public function lhs($id)
    {
        $data['data'] = $this->db->query("SELECT * FROM data_sertifikat_lhs WHERE id_permohonan = '$id'")->row(); 
        $data['array_pilihan'] = '';
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('pdf/lhs', $data, TRUE);
        $mpdf->AddPage("P", "", "", "", "", "8", "8", "8", "8", "", "", "", "", "", "", "", "", "", "", "", "Folio");
        $mpdf->WriteHTML($html);
        $mpdf->Output('pdf.pdf', \Mpdf\Output\Destination::INLINE);
    }
}
