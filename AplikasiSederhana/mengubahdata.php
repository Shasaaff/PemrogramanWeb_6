<?php
include('koneksi.php'); // Memasukkan file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // Membuat query SQL untuk mengubah data siswa
    $sql = "UPDATE tablesiswa SET nama=?, tempat_lahir=?, tanggal_lahir=?, alamat=? WHERE nis=?";
    
    // Memeriksa apakah $sql telah didefinisikan dengan benar
    if ($sql != "") {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nama, $tempat_lahir, $tanggal_lahir, $alamat, $nis);
        
        if ($stmt->execute()) {
            echo "Data siswa dengan NIS $nis berhasil diubah.";
        } else {
            echo "Gagal mengubah data siswa.";
        }
    } else {
        echo "Query is empty.";
    }
}
?>

<form method="post" action="">
    NIS siswa yang ingin diubah: <input type="text" name="nis"><br>
    Nama: <input type="text" name="nama"><br>
    Tempat Lahir: <input type="text" name="tempat_lahir"><br>
    Tanggal Lahir: <input type="date" name="tanggal_lahir"><br>
    Alamat: <input type="text" name="alamat"><br>
    <input type="submit" value="Ubah">
</form>
