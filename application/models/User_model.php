<?php

class User_model extends CI_Model
{
    public function proses_edit()
    {
        $formdata = $this->input->post('form_edit');
		parse_str($formdata,$data);
		$id = $data['id'];
        $nama = $data['nama'];
        $username = $data['username'];
        $password = $data['password'];
        $query = $this->db->query("UPDATE user SET nama_lengkap='$nama',username='$username',password = '$password' WHERE id = '$id' ");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function proses_delete()
    {
        $formdata = $this->input->post('form_delete');
		parse_str($formdata,$data);
		$id = $data['id'];        
        $query = $this->db->query("DELETE FROM user WHERE id = '$id' ");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
?>