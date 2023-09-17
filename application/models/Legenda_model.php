<?php

class Legenda_model extends CI_Model
{
    public function getAllLegenda()
    {
        return $this->db->get('legenda')->result_array();
    }
    public function TambahDataLegenda()
    {
        $config['upload_path']          = './assets/legenda';
        $config['allowed_types']        = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size']             = 5048; //2MB
        $this->load->library('upload', $config);
        if (!empty($_FILES['foto']['name'])) {
            $this->upload->do_upload('foto');
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];
        }

        $id_legenda = $this->input->post('id_legenda');
        $type = $this->input->post('type');
        $legenda = $this->input->post('legenda');

        $query = $this->db->query("INSERT INTO legenda (
            id_legenda,
            type,
            legenda,
            foto
            ) 
            VALUES(
                '$id_legenda',
                '$type',
                '$legenda',
                '$file1'                 
                )");
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function HapusDataLegenda($id_legenda)
    {
        $this->db->where('id_legenda', $id_legenda);
        $this->db->delete('legenda');
    }

    public function getLegendaById($id)
    {
        return $this->db->get_where('legenda', ['id_legenda' => $id])->row_array();
    }

    public function UbahDataLegenda()
{
    $id_legenda = $this->input->post('id_legenda');
    $type = $this->input->post('type');
    $legenda = $this->input->post('legenda');

    // Periksa apakah ada file gambar yang akan diupload
    if (!empty($_FILES['foto']['name'])) {
        // Konfigurasi upload gambar
        $config['upload_path'] = './assets/legenda';
        $config['allowed_types'] = 'pdf|PDF|png|PNG|jpg|JPG';
        $config['max_size'] = 5048; // 2MB
        $this->load->library('upload', $config);

        // Lakukan upload gambar
        if ($this->upload->do_upload('foto')) {
            $data1 = $this->upload->data();
            $file1 = $data1['file_name'];

            // Hapus file gambar lama jika ada
            // Anda perlu mengganti "NAMA_FILE_LAMA" dengan nama file lama yang ada di database
            if (!empty($NAMA_FILE_LAMA)) {
                unlink('./assets/legenda/' . $NAMA_FILE_LAMA);
            }
        } else {
            // Handle kesalahan upload gambar jika diperlukan
            $file1 = ''; // Atur menjadi string kosong jika terjadi kesalahan
        }
    } else {
        // Jika tidak ada gambar yang diupload, gunakan nama file lama
        // Anda perlu mengganti "NAMA_FILE_LAMA" dengan nama file lama yang ada di database
        $file1 = $NAMA_FILE_LAMA;
    }

    // Update data legenda
    $query = $this->db->query("UPDATE legenda SET
        type = '$type',
        legenda = '$legenda',
        foto = '$file1'
        WHERE id_legenda = '$id_legenda'");

    if ($query) {
        return true;
    } else {
        return false;
    }
}

}
