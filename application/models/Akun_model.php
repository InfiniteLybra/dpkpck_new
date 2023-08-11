<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    public function UpdateProfile()
    {
        $id_user = $this->session->userdata('id_user');
        $getFoto = $this->db->query("SELECT * FROM user WHERE id_user = '$id_user'")->row();
        $profile = $getFoto->profile;
        // if(isset($_POST['submit'])){
        // $this->form_validation->set_rules('name','Name','required');
        $config['upload_path']          = './assets/image/profile';
        $config['allowed_types']        = 'jpg|JPG|png|PNG|jpeg|JPEG';
        $config['max_size']             = 2048; //2MB
        // $config['max_width']            = 2048;
        // $config['max_height']           = 2000;
        // $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        //file1
        if (!empty($_FILES['avatar']['name'])) {
            $this->upload->do_upload('avatar');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }else{
            $file1 = $profile;
        }
        $nama_lengkap = $this->input->post("nama");
        $no_hp = $this->input->post("no_hp");
        $alamat = $this->input->post("alamat");
        $query = $this->db->query(" UPDATE user SET
            nama_lengkap = '$nama_lengkap',
            alamat_user = '$alamat',
            no_telp_user = '$no_hp',
            profile = '$file1'

            WHERE id_user = '$id_user'
        ");

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
?>