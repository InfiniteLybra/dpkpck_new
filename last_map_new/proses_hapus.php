<?php
// Load file koneksi.php
$conn = new mysqli("localhost", "root", "", "dpkcpk");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah id telah diteruskan melalui URL
if(isset($_GET['id'])){
    // Ambil data NIS yang dikirim oleh index.php melalui URL
    $id = $_GET['id'];

    // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
    $sql = $conn->prepare("SELECT * FROM shp_koordinat WHERE id=?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        
        // Cek apakah file terkait ada
        if (is_file($data['shp'])) {
            unlink($data['shp']); // Hapus file terkait
        }

        // Query untuk menghapus data siswa berdasarkan ID yang dikirim
        $sql = $conn->prepare("DELETE FROM shp_koordinat WHERE id=?");
        $sql->bind_param('i', $id);
        $execute = $sql->execute(); // Eksekusi query

        if ($execute) {
            // Jika Sukses, Lakukan :
            header("location: form_shp.php"); // Redirect ke halaman form_shp.php
        } else {
            // Jika Gagal, Lakukan :
            echo "Data gagal dihapus. <a href='form_shp.php'>Kembali</a>";
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan dalam URL.";
}
?>

