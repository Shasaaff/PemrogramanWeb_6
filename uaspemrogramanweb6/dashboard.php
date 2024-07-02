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
    <title>Dashboard</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>Data Group C</h1>
    <a href="add_group.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>Group</th>
            <th>Negara</th>
            <th>Menang</th>
            <th>Seri</th>
            <th>Kalah</th>
            <th>Poin</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['group_name'] ?></td>
            <td><?= $row['country_name'] ?></td>
            <td><?= $row['win'] ?></td>
            <td><?= $row['draw'] ?></td>
            <td><?= $row['loss'] ?></td>
            <td><?= $row['points'] ?></td>
            <td>
                <a href="edit_group.php?id=<?= $row['id'] ?>">Edit</a>
                <a href="delete_group.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
