<?php
include('koneksi.php'); // Memasukkan file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];

    // Menyiapkan query SQL untuk menyimpan data
    $sql = "INSERT INTO tablesiswa (nis, nama, tempat_lahir, tanggal_lahir, alamat) VALUES ('$nis', '$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat')";

    // Menjalankan query SQL
    if ($conn->query($sql) === TRUE) {
        echo "Data siswa berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data Siswa</title>
    <!-- Tambahkan CSS atau script lainnya di sini jika diperlukan -->
</head>
<body>
    <h1>PENDAFTARAN SISWA</h1>

    <!-- Form input data siswa -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Nis:            <input type="text" name="nis"><br>
        Nama:           <input type="text" name="nama"><br>
        Tempat Lahir:   <input type="text" name="tempat_lahir"><br>
        Tanggal Lahir:  <input type="date" name="tanggal_lahir"><br>
        Alamat:         <input type="text" name="alamat"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
