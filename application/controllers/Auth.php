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
            redirect('kkpr');
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
        $nik = $this->input->post('nik');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $password = $this->input->post('password');
        $no_telp = $this->input->post('no_telp');

        $cek_username = $this->Auth_model->cek_user('username', $username);
        $cek_nik = $this->Auth_model->cek_user('nik', $nik);
        $cek_no_telp = $this->Auth_model->cek_user('no_telp', $no_telp);

        date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu yang Anda inginkan
        $kode = strval(date('sih'));

        if ($cek_username == false) {
            $this->session->set_flashdata('error', 'Kesalahan, username telah digunakan. Masukkan username yang belum digunakan.');
            redirect('auth/register');
        }

        if ($cek_nik == false) {
            $this->session->set_flashdata('error', 'Kesalahan, nik telah digunakan! Masukkan nik yang belum digunakan.');
            redirect('auth/register');
        }

        if ($cek_no_telp == false) {
            $this->session->set_flashdata('error', 'Kesalahan, nik telah digunakan! Masukkan no wa yang belum digunakan.');
            redirect('auth/register');
        }

        $register = $this->Auth_model->register_pemohon($username, $nik, $nama_lengkap, $password, $no_telp, $kode);

        if ($register == true) {
            $this->session->set_flashdata('success', 'Berhasil, Akun anda sedang tahap verifikasi!');
        } else {
            $this->session->set_flashdata('error', 'Kesalaham, pastikan jaringan koneksi anda stabil!');
            redirect('auth/register');
        }

        $data['username'] = $username;
        $data['nik'] = $nik;
        $data['kode'] = $kode;

        if (empty($data['username'] && $data['nik'])) {
            $this->session->set_flashdata('error', 'Kesalaham, tidak ada akun yang diverifikasi');
            redirect('auth/register');
        }
        $this->load->view('auth/otp_register', $data);
    }
    public function register_verifikasi()
    {
        $data['username'] = $this->input->post('username');
        $data['nik'] = $this->input->post('nik');

        $this->load->view('auth/register_verifikasi', $data);
    }
    public function register_sukses()
    {
        $username = $this->input->post('username');
        $nik = $this->input->post('nik');

        $sukses = $this->Auth_model->register_sukses($username, $nik);
        $this->session->set_flashdata('success', 'Berhasil, akun anda berhasil dan siap digunakan!');
        redirect('auth');
    }
    public  function etes()
    {
        // $curl = curl_init();

        // date_default_timezone_set('Asia/Jakarta'); // Ganti dengan zona waktu yang Anda inginkan
        // $kode = strval(date('sih'));
        // $pesan = '*Kode OTP ~ ' . $kode . '* Jangan beritahu siapapun. Kode OTP ini untuk aktivasi akun ... | Trimakasih';

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.fonnte.com/send',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => array(
        //         'target' => '08123456789',
        //         'message' => $pesan,
        //         'url' => 'https://md.fonnte.com/images/wa-logo.png',
        //         'filename' => 'filename',
        //         'schedule' => '0',
        //         'typing' => false,
        //         'delay' => '0',
        //         'countryCode' => '62',
        //     ),
        //     CURLOPT_HTTPHEADER => array(
        //         'Authorization: 6fQRbc5v_00XJ-cT!CHz'
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // echo $response;

    }
    public function logout()
    {
        $this->load->view('auth/otp_register');
    }
    public function tes()
    {
        $this->load->view('auth/verifikasi_register');
    }
}
