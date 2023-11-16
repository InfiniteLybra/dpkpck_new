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

            // Tambahkan pengecekan status berkas
            if ($cek_log->status_verifikasi == 'Terverifikasi') {
                if ($cek_log->level == 1) {
                    redirect('Dashboard/user');
                } else {
                    redirect('Dashboard/admin');
                }
            } else {
                $this->session->set_flashdata('error', 'Status berkas Anda belum terverifikasi.');
                redirect('Auth'); // Atau redirect ke halaman lain jika diperlukan
            }
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan');
            redirect('Auth');
        }
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
        // Set aturan validasi untuk setiap field
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|min_length[8]', array(
            'required' => 'Harap masukkan nama lengkap.',
            'min_length' => 'Nama lengkap harus minimal 8 karakter.'
        ));

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|is_unique[user.username]|regex_match[/^\S*$/]', array(
            'required' => 'Harap masukkan username.',
            'min_length' => 'Username harus minimal 8 karakter.',
            'is_unique' => 'Username sudah digunakan. Harap pilih username lain.',
            'regex_match' => 'Username tidak boleh mengandung spasi.'
        ));

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', array(
            'required' => 'Harap masukkan password.',
            'min_length' => 'Password harus minimal 8 karakter.'
        ));

        $this->form_validation->set_rules('confirmPassword', 'Ulangi Password', 'required|matches[password]', array(
            'required' => 'Harap konfirmasi password.',
            'matches' => 'Password dan konfirmasi password tidak cocok.'
        ));

        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]', array(
            'required' => 'Harap masukkan NIK.',
            'numeric' => 'NIK harus berupa angka.',
            'exact_length' => 'NIK harus terdiri dari 16 digit.'
        ));

        $this->form_validation->set_rules('nomor', 'No. Telp', 'required|numeric|exact_length[13]', array(
            'required' => 'Harap masukkan nomor telepon.',
            'numeric' => 'Nomor telepon harus berupa angka.',
            'exact_length' => 'Nomor telepon harus terdiri dari 13 digit.'
        ));

        // Jalankan validasi
        if ($this->form_validation->run() == false) {
            $registration_data = array(
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'confirmPassword' => $this->input->post('confirmPassword'),
                'nik' => $this->input->post('nik'),
                'nomor' => $this->input->post('nomor'),
            );
            $this->session->set_userdata('registration_data', $registration_data);

            $this->session->set_flashdata('error', validation_errors());
            // Tampilkan pesan kesalahan
            $this->load->view('auth/register');
        } else {
            // Jika validasi berhasil, lanjutkan dengan proses registrasi
            $username = $this->input->post('username', true);
            $nama_lengkap = $this->input->post('nama_lengkap', true);
            $password = $this->input->post('password', true);
            $nomor = $this->input->post('nomor', true);
            $nik = $this->input->post('nik', true);
            $this->session->set_userdata('nomor', $nomor);

            // Lanjutkan dengan proses registrasi
            $config['upload_path'] = './assets_dokumen/auth/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = 5048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_ktp')) {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
            }

            $timestamp = date('l, d-m-Y');


            if ($this->input->post('submitButton')) {
                $nomor = $this->db->escape_str($nomor);
                if ($nomor) {

                    $curl = curl_init();
                    $otp = rand(100000, 999999);
                    $waktu = time();
                    $this->Auth_model->insertUser($nomor, $otp, $waktu);
                    $data = [
                        'target' => $nomor,
                        'message' => "Your OTP : " . $otp
                    ];

                    curl_setopt(
                        $curl,
                        CURLOPT_HTTPHEADER,
                        array(
                            "Authorization: 9Sn+qbEWAjSvpSx9LbAQ",
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

                    $register = $this->Auth_model->register($username, $nama_lengkap, $password, $nomor, $otp, $waktu, $nik, $file_name, $timestamp);

                    if ($register ==  true) {
                        $this->session->set_flashdata('success', 'Kode OTP Telah Dikirim');
                        redirect('auth/registerotp');
                    } else {
                        $this->session->set_flashdata('error', 'Kesalahan, pengguna telah ada');
                        redirect('auth/register');
                    }
                }
            } elseif ($this->input->post('otpButton')) {
                $otp = $this->input->post('otp');
                $nomor = $this->input->post('nomor');

                $result = $this->Auth_model->validateOTP($nomor, $otp);

                if ($result) {
                    $waktu = $result['waktu'];
                    if (time() - $waktu <= 300) {
                        $this->session->set_flashdata('success', 'Akun Anda berhasil dibuat');
                        $user_id = $this->session->userdata('id');
                        redirect('Auth/loading/' . $user_id);
                    } else {
                        $this->session->set_flashdata('error', 'Kode OTP Anda telah kadaluarsa');
                        redirect('auth/registerotp');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Kode OTP Anda salah');
                    redirect('auth/registerotp');
                }
            } elseif ($this->input->post('sendAgain')) {
                $nomor = $this->input->post('nomor');
                $this->session->set_userdata('nomor_telepon', $nomor);

                $user = $this->Auth_model->getUserByNomor($nomor);

                if ($user) {

                    $otp_baru = rand(100000, 999999);
                    $waktu = time();

                    $this->Auth_model->updateOTP($nomor, $otp_baru, $waktu);

                    $data = [
                        'target' => $nomor,
                        'message' => "Your New OTP: " . $otp_baru
                    ];

                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: 9Sn+qbEWAjSvpSx9LbAQ"));
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
            $this->session->unset_userdata('registration_data');
            redirect('auth/registerotp');
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

    public function loading($user_id)
    {
        $data['id'] = $user_id;
        $this->load->view('auth/loading', $data);
    }

    public function update_verification_status()
    {

        if (!$this->session->userdata('id')) {
            redirect('Welcome');
        }
        // var_dump($_POST);die;

        $user_id = $this->input->post('id');
        $verification_status = $this->input->post('status_verivikasi');
        // var_dump($verification_status);die;

        $data = array('status_verifikasi' => $verification_status);
        $this->db->where('id', $user_id);
        $this->db->update('user', $data);

        $this->db->where('id', $user_id);
        $query = $this->db->get('user');
        $result = $query->result();
        foreach ($result as $r) {
            $curl = curl_init();
            // var_dump($r->nomor);

            $data = [
                'target' => $r->nomor,
                'message' => "Selamat akun anda telah diaktivasi oleh admin\n\n" .
                    "Silahkan gunakan user dibawah ini untuk login dan memulai pengisian formulir anda\n" .
                    "Username : " . $r->username . "\n" .
                    "Password : " . $r->password . "\n\n" .
                    "Silahkan login melalui link di bawah ini atau mengunjungi website kami\n" .
                    "https://epora.com"
            ];


            curl_setopt(
                $curl,
                CURLOPT_HTTPHEADER,
                array(
                    "Authorization: 9Sn+qbEWAjSvpSx9LbAQ",
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
        }
        // error_log('Perintah SQL:', $this->db->last_query());

        redirect('Auth');
    }

    public function kirim_otp($nomor)
    {
        $this->db->where('nomor', $nomor);
        $query = $this->db->get('user');
        if ($query) {
            $otp_baru = rand(100000, 999999);
            $waktu = time();

            $data = array(
                'otp' => $otp_baru,
                'waktu' => $waktu,
            );
            $this->db->update('user', $data);

            $data = [
                'target' => $nomor,
                'message' => "Your New OTP : " . $otp_baru
            ];

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: 9Sn+qbEWAjSvpSx9LbAQ"));
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
