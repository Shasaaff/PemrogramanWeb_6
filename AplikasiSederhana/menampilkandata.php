<?php include('header.php'); ?>

<?php
include('koneksi.php'); // Memasukkan file koneksi database

// Query untuk mengambil data siswa dari database
$sql = "SELECT * FROM tablesiswa";
$result = $conn->query($sql);

// Menampilkan data siswa jika ada
if ($result->num_rows > 0) {
    echo "<h2>Data Siswa</h2>";
    echo "<table border='1'>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>";
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["nis"]."</td>
                <td>".$row["nama"]."</td>
                <td>".$row["tempat_lahir"]."</td>
                <td>".$row["tanggal_lahir"]."</td>
                <td>".$row["alamat"]."</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data siswa";
}
?>

<?php include('footer.php'); ?>
