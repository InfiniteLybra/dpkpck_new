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
    public function register($username, $nama_lengkap, $password)
    {
        $this->db->from($this->table_user);
        $this->db->where('username',  $username);
        $jml_user = count($this->db->get()->result());

        if ($jml_user == 0) {

            $data = array(
                "username" => $username,
                "nama_lengkap" => $nama_lengkap,
                "password" => $password,
                "level" => '1'
            );

            $this->db->insert($this->table_user, $data);

            return true;
        } else {
            return false;
        }
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
