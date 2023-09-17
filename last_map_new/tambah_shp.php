<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dpkcpk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<?php
if (isset($_POST["upload"])) {
    // $title = $_POST["title"];
    $angkaAcak = mt_rand(1000, 9999);
    $target_dir = "shp/"; // Folder untuk menyimpan gambar
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek jika file sudah ada
        if (file_exists($target_file)) {
            echo "Maaf, file tersebut sudah ada.";
        } else {
            // Upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // Simpan informasi gambar ke database
                $sql = "INSERT INTO shp_koordinat (id, shp) VALUES ('$angkaAcak', '$target_file')";
                if ($conn->query($sql) === TRUE) {
                    echo "File berhasil diupload dan informasi tersimpan.";
                    header("location: shp.php"); 
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Maaf, ada kesalahan saat mengunggah file.";
            }
        }
}

$conn->close();
?>
