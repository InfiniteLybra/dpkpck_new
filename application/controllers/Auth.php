<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth_model");
    }
    public function index()
    {
        $this->load->view('auth/login');
    }
    public function proses_log()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek_log = $this->Auth_model->cek_user($username, $password);
        if (!empty($cek_log)) {
            $this->session->set_userdata('id_user', $cek_log->id);
            $this->session->set_userdata('nama', $cek_log->nama_lengkap);
            $this->session->set_userdata('username', $cek_log->username);
            $this->session->set_userdata('level', $cek_log->level);
            $this->session->set_userdata('isLogin', true);
            $this->session->set_flashdata('success', 'Selamat datang <b>' . $cek_log->nama_lengkap . '</b>');
            redirect('User');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
        }
        redirect('');
    }
    public function register()
    {
        $this->load->view('auth/register');
    }
    public function proses_register()
    {
        $username = $this->input->post('username');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $password = $this->input->post('password');
        $register = $this->Auth_model->register($username, $nama_lengkap, $password);
        if ($register ==  true) {
            $this->session->set_flashdata('success', 'Daftar akun berhasil');
        } else {
            $this->session->set_flashdata('error', 'Kesalahan, pengguna telah ada');
        }
        redirect('auth');
    }
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('isLogin',);
        redirect('Auth');
    }
}
