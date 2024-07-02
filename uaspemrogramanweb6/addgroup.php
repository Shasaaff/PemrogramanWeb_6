<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Data yang ingin dimasukkan
$data = [
    ['group_id' => 3, 'country_id' => 1, 'win' => 1, 'draw' => 2, 'loss' => 0, 'points' => 5], // Inggris
    ['group_id' => 3, 'country_id' => 2, 'win' => 0, 'draw' => 3, 'loss' => 0, 'points' => 3], // Denmark
    ['group_id' => 3, 'country_id' => 3, 'win' => 0, 'draw' => 3, 'loss' => 0, 'points' => 3], // Slovenia
    ['group_id' => 3, 'country_id' => 4, 'win' => 0, 'draw' => 2, 'loss' => 1, 'points' => 2]  // Serbia
];

foreach ($data as $row) {
    $stmt = $conn->prepare("INSERT INTO standings (group_id, country_id, win, draw, loss, points) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiiii", $row['group_id'], $row['country_id'], $row['win'], $row['draw'], $row['loss'], $row['points']);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan untuk negara ID: " . $row['country_id'] . "<br>";
    } else {
        echo "Terjadi kesalahan untuk negara ID: " . $row['country_id'] . ": " . $conn->error . "<br>";
    }
}
?>
