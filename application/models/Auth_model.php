<?php
class Auth_model extends CI_Model
{
    private $table_user = 'user';

    function cek_login()
    {
        if (empty($this->session->userdata('isLogin'))) {
            redirect('login');
        }
    }
    public function cek_akun($kolom, $username)
    {
        $this->db->from($this->table_user);
        $this->db->where($kolom,  $username);
        return $this->db->get()->row();
    }
    public function cek_user($username, $password)
    {
        $this->db->from($this->table_user);
        $this->db->where('username',  $username);
        $this->db->where('password',  $password);
        $cek = $this->db->get()->row();
        if (empty($cek)) {
            return true;
        } else {
            return false;
        }
    }
    public function register_pemohon($username, $nik, $nama_lengkap, $password, $no_telp, $kode)
    {
        $pesan = '*Kode OTP ~ ' . $kode . '* Jangan beritahu siapapun. Kode OTP ini untuk aktivasi akun ... | Terimakasih';

        $data = array(
            "username" => $username,
            "nik" => $nik,
            "nama_lengkap" => $nama_lengkap,
            "password" => $password,
            "level" => '1',
            "status" => 'pending',
            "no_telp" =>  $no_telp,
        );

        $this->db->insert($this->table_user, $data);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $no_telp,
                'message' => $pesan,
                'url' => 'https://md.fonnte.com/images/wa-logo.png',
                'filename' => 'filename',
                'schedule' => '0',
                'typing' => false,
                'delay' => '0',
                'countryCode' => '62',
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5@6!I4e2eSKYewSZSFhD'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;

        return true;
    }
    public function register_sukses($username, $nik)
    {

        $data = array(
            "status" => "sukses",
        );
        return $this->db->update($this->table_user, $data, array('username' => $username, 'nik' => $nik));
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
        if (!($this->session->userdata('level') == '1')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <b>Staff Teknis</b>.');
            redirect('kkpr');
        }
    }
    // level korektor
    function level_3()
    {
        if (!($this->session->userdata('level') == '2')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <strong>Korektor</strong>.');
            redirect('kkpr');
        }
    }
    // level master
    function level_4()
    {
        if (!($this->session->userdata('level') == '3')) {
            $this->session->set_flashdata('error', 'Maaf, halaman hanya untuk <strong>Master</strong>.');
            redirect('kkpr');
        }
    }
}
