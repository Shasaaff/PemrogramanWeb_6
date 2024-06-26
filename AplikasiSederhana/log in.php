<?php
session_start();

include('koneksi.php'); // Memasukkan file koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['admin'];
    $password = $_POST['caca'];

    $sql = "SELECT * FROM log in WHERE username=admin AND caca=?";
    
    // Memastikan $sql telah didefinisikan sebelum digunakan
    if ($sql != "") {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $admin, $caca);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header('Location: index.php');
        } else {
            echo "Invalid login details";
        }
    } else {
        echo "Query is empty";
    }
}
?>

<form method="post" action="">
    Username: <input type="text" name="admin"><br>
    Password: <input type="password" name="caca"><br>
    <input type="submit" value="Login">
</form>
