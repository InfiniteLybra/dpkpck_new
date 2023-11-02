<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function update_kkpr($id)
    {
        $kkpr = $this->db->query("SELECT * FROM kkpr_permohonan WHERE id_kkpr_permohonan = '$id'")->row();
        $date = date('y-m-d');
        $query = $this->db->query("UPDATE kkpr_permohonan SET status_berkas = '1' WHERE id_kkpr_permohonan = '$id'");
        $this->db->query("UPDATE kkpr_permohonan SET tgl_reg = '$date' WHERE id_kkpr_permohonan = '$id'");
        $curl = curl_init();
        $telp_pemohon = $kkpr->telp_pemohon;
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
                'target' => $telp_pemohon,
                'message' => 'Salam, kami dari DPKPCK menyampaikan bahwa permohonan anda sudah berhasil dipulihkan, harap segera memperbaiki formulir anda. Terimakasih',
                'countryCode' => '62', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5@6!I4e2eSKYewSZSFhD' //change TOKEN to your actual token
            ),
        ));

        $response = curl_exec($curl);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
