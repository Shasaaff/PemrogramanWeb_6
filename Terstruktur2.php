<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Akademik</title>
</head>
<body>
    <h1>Nilai Akademik</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama"><br><br>

        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim"><br><br>

        <label for="matakuliah">Mata Kuliah:</label>
        <input type="text" id="matakuliah" name="matakuliah"><br><br>

        <label for="kehadiran">Jumlah Kehadiran:</label>
        <input type="number" id="kehadiran" name="kehadiran"><br><br>

        <label for="tugas">Nilai Tugas:</label>
        <input type="number" id="tugas" name="tugas"><br><br>

        <label for="uts">Nilai UTS:</label>
        <input type="number" id="uts" name="uts"><br><br>

        <label for="uas">Nilai UAS:</label>
        <input type="number" id="uas" name="uas"><br><br>

        <button type="submit">Submit</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $matakuliah = $_POST['matakuliah'];
            $kehadiran = $_POST['kehadiran'];
            $tugas = $_POST['tugas'];
            $uts = $_POST['uts'];
            $uas = $_POST['uas'];

            $nilai_kehadiran = $kehadiran * 10 / 18;
            $nilai_tugas = $tugas * 20 / 100;
            $nilai_uts = $uts * 30 / 100;
            $nilai_uas = $uas * 40 / 100;

            $nilai_akhir = $nilai_kehadiran + $nilai_tugas + $nilai_uts + $nilai_uas;

            $grade = "";
            $keterangan = "";

            if ($nilai_akhir >= 80) {
                $grade = "A";
            } elseif ($nilai_akhir >= 70) {
                $grade = "B";
            } elseif ($nilai_akhir >= 60) {
                $grade = "C";
            } elseif ($nilai_akhir >= 50) {
                $grade = "D";
            } else {
                $grade = "E";
            }

            if ($nilai_akhir > 65) {
                $keterangan = "Lulus";
            } else {
                $keterangan = "Tidak Lulus";
            }

            echo "<h2>Nilai Akademik</h2>";
            echo "Nama: " . $nama . "<br>";
            echo "NIM: " . $nim . "<br>";
            echo "Mata Kuliah: " . $matakuliah . "<br>";
            echo "Jumlah Kehadiran: " . $kehadiran . "<br>";
            echo "Nilai Kehadiran: " . $nilai_kehadiran . "<br>";
            echo "Nilai Tugas: " . $nilai_tugas . "<br>";
            echo "Nilai UTS: " . $nilai_uts . "<br>";
            echo "Nilai UAS: " . $nilai_uas . "<br>";
            echo "Nilai Akhir: " . $nilai_akhir . "<br>";
            echo "Grade: " . $grade . "<br>";
            echo "Keterangan: " . $keterangan . "<br>";
        }
    ?>
</body>
</html>