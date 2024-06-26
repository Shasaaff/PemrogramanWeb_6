<?php
include('koneksi.php'); // Memasukkan file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];

    // Membuat query SQL untuk menghapus data siswa
    $sql = "DELETE FROM tablesiswa WHERE nis=?";
    
    // Memeriksa apakah $sql telah didefinisikan dengan benar
    if ($sql != "") {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nis);
        
        if ($stmt->execute()) {
            echo "Data siswa dengan NIS $nis berhasil dihapus.";
        } else {
            echo "Gagal menghapus data siswa.";
        }
    } else {
        echo "Query is empty.";
    }
}
?>

<form method="post" action="">
    Masukkan NIS siswa yang ingin dihapus: <input type="text" name="nis"><br>
    <input type="submit" value="Hapus">
</form>
