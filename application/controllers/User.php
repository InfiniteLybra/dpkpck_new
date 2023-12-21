<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Auth_model");
        $this->Auth_model->cek_login();
    }
    public function index()
    {
        // $data['itr'] = $this->db->query("SELECT * FROM itr_kuasa")->result();
        // $data['kkpr'] = $this->db->query("SELECT * FROM kkpr_kuasa")->result();
        $this->load->view('templates/header');
        $this->load->view('user/dashboard/dashboard');
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('user/dashboard/script');
    }
    public function kelola_user()
    {        
        $data['user']= $this->db->query("SELECT * FROM user")->result();
        $this->load->view('templates/header');
        $this->load->view('admin/kelola_user/index',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kelola_user/script');
    }
    public function kelola_register()
    {        
        $data['user'] = $this->db->query("SELECT * FROM user WHERE status_verifikasi = 'Belum Terverifikasi' AND level = '1'")->result();
        // var_dump($data['user']);die;
        $this->load->view('templates/header');
        $this->load->view('admin/kelola_register/index',$data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('admin/kelola_user/script');
    }
    function get_user(){
		$id= $this->input->post('id');
		//$where=array('id' => $id);
		$query = $this->db->query("SELECT * FROM user WHERE id = '$id'")->row();

		echo json_encode($query);
	}
    function proses_edit()
    {
        $query = $this->User_model->proses_edit();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }        
        echo json_encode($info);
        // redirect('User/kelola_user');
    }
    function proses_delete()
    {
        $query = $this->User_model->proses_delete();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }        
        echo json_encode($info);
        // redirect('User/kelola_user');
    }
    function terima_register($id)
    {
        $query = $this->User_model->terima_register($id);
        if ($query == true) {
            $this->session->set_flashdata('success', 'User Berhasil Di Verivikasi');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Terdapat Kesalahan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }        
        // echo json_encode($info);
        redirect('User/kelola_register');
    }
    function tolak_register($id)
    {
        $query = $this->User_model->tolak_register($id);
        if ($query == true) {
            $this->session->set_flashdata('success', 'User Berhasil Di Tolak');
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
        } else {
            $this->session->set_flashdata('error', 'Terdapat Kesalahan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        }        
        // echo json_encode($info);
        redirect('User/kelola_register');
    }

}
?>