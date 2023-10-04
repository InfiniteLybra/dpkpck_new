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
            if($cek_log->level == 1){
                redirect('Dashboard/user');
            }else{
                redirect('User');
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
        }
        redirect('');
    }
    public function register()
    {
        $this->load->view('auth/register');
    }    
    public function registerotp()
    {
        $this->load->view('auth/registerotp');
    }
    public function proses_register()
    {
        $this->load->library('session');
        $username = $this->input->post('username');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $password = $this->input->post('password');
        $nomor = $this->input->post('nomor');
        $this->session->set_userdata('nomor_telepon', $nomor);
        $hostname     = 'localhost';
        $penggunaname     = 'root';
        $passsword     = '';
        $dbname     = 'dpkcpk';
        $conn = mysqli_connect($hostname, $penggunaname, $passsword, $dbname);
        if (isset($_POST['submitButton'])) {
            $nomor = mysqli_escape_string($conn, $_POST['nomor']);
            if ($nomor) {
                // if (!mysqli_query($conn, "DELETE FROM user WHERE nomor = $nomor")) {
                //     echo ("Error description: " . mysqli_error($conn));
                // }
                $curl = curl_init();
                $otp = rand(100000, 999999);
                $waktu = time();
                mysqli_query($conn, "INSERT INTO user (nomor,otp,waktu) VALUES ( $nomor ,$otp , $waktu )");
                $data = [
                    'target' => $nomor,
                    'message' => "Your OTP : " . $otp
                ];

                curl_setopt(
                    $curl,
                    CURLOPT_HTTPHEADER,
                    array(
                        "Authorization: 5@6!I4e2eSKYewSZSFhD",
                    )
                );
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                $result = curl_exec($curl);
                curl_close($curl);

                $register = $this->Auth_model->register($username, $nama_lengkap, $password, $nomor, $otp, $waktu);
                if ($register ==  true) {
                    $this->session->set_flashdata('success', 'Kode OTP Telah Dikirim');
                    redirect('auth/registerotp');
                    // $this->load->view('auth/registerotp', $data);
                } else {
                    $this->session->set_flashdata('error', 'Kesalahan, pengguna telah ada');
                    redirect('auth/register');
                }
            }
        } elseif (isset($_POST['otpButton'])) {
            $hostname     = 'localhost';
            $penggunaname     = 'root';
            $passsword     = '';
            $dbname     = 'dpkcpk';
            $conn = mysqli_connect($hostname, $penggunaname, $passsword, $dbname);
            // var_dump($_POST);
            // die;
            $otp = mysqli_escape_string($conn, $_POST['otp']);
            $nomor = mysqli_escape_string($conn, $_POST['nomor']);
            $q = mysqli_query($conn, "SELECT * FROM user WHERE nomor = $nomor AND otp = $otp");
            $row = mysqli_num_rows($q);
            $r = mysqli_fetch_array($q);
            if ($row) {
                if (time() - $r['waktu'] <= 300) {
                    $this->session->set_flashdata('success', 'Akun anda berhasil dibuat');
                    redirect('User');
                    // var_dump($row);
                    // die;
                } else {
                    $this->session->set_flashdata('error', 'Kode OTP anda Expired');
                    redirect('auth/registerotp');
                    // var_dump($row);
                    // die;
                }
            } else {
                $this->session->set_flashdata('error', 'Kode OTP anda salah');
                redirect('auth/registerotp');
                // var_dump($row);
                // die;
            }
        } elseif (isset($_POST['sendAgain'])) {
            $this->session->set_userdata('nomor_telepon', $nomor);
            $nomor = mysqli_escape_string($conn, $_POST['nomor']);
            // var_dump($nomor);die;
            // Cek apakah nomor telepon ada di database
            $query = mysqli_query($conn, "SELECT * FROM user WHERE nomor = $nomor");
            $row = mysqli_fetch_array($query);

            if ($row) {
                // Generate ulang kode OTP
                $otp_baru = rand(100000, 999999);
                $waktu = time();

                // Update kode OTP yang baru ke dalam database
                mysqli_query($conn, "UPDATE user SET otp = $otp_baru, waktu = $waktu WHERE nomor = $nomor");

                // Kirim ulang OTP melalui SMS atau metode lainnya
                $data = [
                    'target' => $nomor,
                    'message' => "Your New OTP : " . $otp_baru
                ];

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: 5@6!I4e2eSKYewSZSFhD"));
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                curl_setopt($curl, CURLOPT_URL, "https://api.fonnte.com/send");
                curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
                $result = curl_exec($curl);
                curl_close($curl);

                $this->session->set_flashdata('success', 'Kode OTP telah dikirim ulang');
                redirect('auth/registerotp');
            } else {
                $this->session->set_flashdata('error', 'Nomor telepon tidak ditemukan');
                redirect('auth/registerotp');
            }
        }
    }
    public function kirim_ulang_otp()
    {
        $this->load->library('session');
        $hostname = 'localhost';
        $penggunaname = 'root';
        $passsword = '';
        $dbname = 'dpkcpk';
        $conn = mysqli_connect($hostname, $penggunaname, $passsword, $dbname);
    }
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('isLogin',);
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
