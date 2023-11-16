<?php
class Auth_model extends CI_Model
{
    private $table_user = 'user';

    function cek_login()
    {
        if (empty($this->session->userdata('isLogin'))) {
            redirect('Auth');
        }
    }
    public function cek_user($username, $password)
    {
        $this->db->from($this->table_user);
        $this->db->where('username',  $username);
        $this->db->where('password',  $password);
        return $this->db->get()->row();
    }
    public function register($username, $nama_lengkap, $password, $nomor, $otp, $waktu, $nik, $file_name, $timestamp)
    {
        $this->db->from($this->table_user);
        $this->db->where('username',  $username);
        $jml_user = $this->db->get()->num_rows();
        // $jml_user = $this->db->get()->result();
        if ($jml_user == 0) {

            $data = array(
                "username" => $username,
                "nama_lengkap" => $nama_lengkap,
                "password" => $password,
                "nomor" => $nomor,
                "otp" => $otp,
                "waktu" => $waktu,
                "level" => '1',
                "nik" => $nik,
                "foto_ktp" => $file_name,
                "tanggal_register" => $timestamp
            );

            $this->db->insert($this->table_user, $data);
            $user_id = $this->db->insert_id();
            $this->session->set_userdata('id', $user_id);

            // redirect('Auth/loading/' . $user_id);

            return true;
        } else {
            return false;
        }
    }
    public function getUserByNomor($nomor)
    {

        $query = $this->db->get_where('user', array('nomor' => $nomor));
        return $query->row_array();
    }

    public function updateOTP($nomor, $otp, $waktu)
    {

        $data = array('otp' => $otp, 'waktu' => $waktu);
        $this->db->where('nomor', $nomor);
        $this->db->update('user', $data);
    }

    public function validateOTP($nomor, $otp)
    {

        $query = $this->db->get_where('user', array('nomor' => $nomor, 'otp' => $otp));
        return $query->row_array();
    }

    public function insertUser($nomor, $otp, $waktu)
    {
        $data = array(
            'otp' => $otp,
            'waktu' => $waktu
        );
        
        $this->db->where('nomor', $nomor);
        $this->db->insert('user', $data);
    }
    // level pemohon
    function level_1()
    {
        if (!($this->session->userdata('level') == '1')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <b>Pemohon</b>.');
            redirect('kkpr');
        }
    }
    // level staff teknis
    function level_2()
    {
        if (!($this->session->userdata('level') == '2')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <b>Staff Teknis</b>.');
            redirect('kkpr');
        }
    }
    // level korektor
    function level_3()
    {
        if (!($this->session->userdata('level') == '3')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <strong>Korektor</strong>.');
            redirect('kkpr');
        }
    }
    // level master
    function level_4()
    {
        if (!($this->session->userdata('level') == '4')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <strong>Master</strong>.');
            redirect('kkpr');
        }
    }
    // level superadmin
    function level_5()
    {
        if (!($this->session->userdata('level') == '5')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <strong>Super Admin</strong>.');
            redirect('kkpr');
        }
    }
}
