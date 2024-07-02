<?php
session_start();
include 'db.php'; // Menyertakan file db.php untuk koneksi database

if (isset($_POST['login'])) {
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    
    // Memastikan bahwa nim dan password yang diambil dari form telah di-escape
    $nim = $conn->real_escape_string($nim);
    $password = $conn->real_escape_string($password);

    // Menetapkan nilai NIM dan password yang benar untuk pengujian
    $correct_nim = '211011400264';
    $correct_password = '270803'; // Password yang benar, Anda mungkin ingin meng-hash password di sini jika menggunakan hashing

    // Mengubah pernyataan SQL agar sesuai dengan sintaks yang benar
    if ($nim === $correct_nim && $password === $correct_password) {
        // Simulasikan ID pengguna dan simpan dalam sesi
        $_SESSION['user_id'] = '1'; // Ganti dengan ID pengguna yang sesuai
        header("Location: dashboard.php"); // Arahkan ke halaman dashboard
        exit;
    } else {
        $error = "NIM atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        NIM: <input type="text" name="nim" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <?php
    // Menampilkan pesan error jika ada
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
</body>
</html>
