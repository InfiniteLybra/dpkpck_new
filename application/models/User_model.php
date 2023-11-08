<?php

class User_model extends CI_Model
{
    public function proses_edit()
    {
        $formdata = $this->input->post('form_edit');
        parse_str($formdata, $data);
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
        parse_str($formdata, $data);
        $id = $data['id'];
        $query = $this->db->query("DELETE FROM user WHERE id = '$id' ");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function terima_register($id)
    {
        $data = array(
            'status_verifikasi' => 'Terverifikasi'
        );

        // Menggunakan metode update untuk mengubah nilai kolom 'status_verifikasi'
        $this->db->where('id', $id);
        $this->db->update('user', $data);


        $this->db->where('id', $id);
        $query = $this->db->get('user');
        $result = $query->result();
        foreach ($result as $r) {
            $curl = curl_init();

            $data = [
                'target' => $r->nomor,
                'message' => "Selamat akun anda telah diaktivasi oleh admin\n\n" .
                    "Silahkan gunakan user dibawah ini untuk login dan memulai pengisian formulir anda:\n" .
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

            return $result;
        }
        return true;
    }

    public function tolak_register($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        $result = $query->result();
        foreach ($result as $r) {
            $curl = curl_init();
            var_dump($r->nomor);

            $data = [
                'target' => $r->nomor,
                'message' => "Akun anda telah di tolak oleh admin"
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

            $this->db->where('id', $id);
            $this->db->delete('user');
        }

        return true;
    }
}
