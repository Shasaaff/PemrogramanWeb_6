<?php
include('koneksi.php'); // Memasukkan file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search_nis = $_POST['search_nis'];

    // Membuat query SQL untuk mencari data siswa berdasarkan NIS
    $sql = "SELECT * FROM tablesiswa WHERE nis = ?";
    
    // Memeriksa apakah $sql telah didefinisikan dengan benar
    if ($sql != "") {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $search_nis);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h2>Hasil Pencarian</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                    </tr>";
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
            echo "Data siswa tidak ditemukan.";
        }
    } else {
        echo "Query is empty.";
    }
}
?>

<form method="post" action="">
    Masukkan NIS siswa yang ingin dicari: <input type="text" name="search_nis"><br>
    <input type="submit" value="Cari">
</form>
