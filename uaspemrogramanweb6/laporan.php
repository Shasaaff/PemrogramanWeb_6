<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT s.id, g.name as group_name, c.name as country_name, s.win, s.draw, s.loss, s.points
                        FROM standings s
                        JOIN groups g ON s.group_id = g.id
                        JOIN countries c ON s.country_id = c.id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
</head>
<body>
    <h1>Data C</h1>
    <p>Per <?= date('d M Y H:i:s') ?></p>
    <table border="1">
        <tr>
            <th>Group</th>
            <th>Negara</th>
            <th>Menang</th>
            <th>Seri</th>
            <th>Kalah</th>
            <th>Poin</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['group_name'] ?></td>
            <td><?= $row['country_name'] ?></td>
            <td><?= $row['win'] ?></td>
            <td><?= $row['draw'] ?></td>
            <td><?= $row['loss'] ?></td>
            <td><?= $row['points'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="cetak_laporan.php" target="_blank">Cetak PDF</a>
</body>
</html>
