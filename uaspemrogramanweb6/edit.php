<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM standings WHERE id='$id'");
$data = $result->fetch_assoc();

if (isset($_POST['edit_group'])) {
    $group_id = $_POST['group_id'];
    $country_id = $_POST['country_id'];
    $win = $_POST['win'];
    $draw = $_POST['draw'];
    $loss = $_POST['loss'];
    $points = $win * 3 + $draw;

    $conn->query("UPDATE standings SET group_id='$group_id', country_id='$country_id', win='$win', draw='$draw', loss='$loss', points='$points' WHERE id='$id'");
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Group</title>
</head>
<body>
    <form method="post">
        Group:
        <select name="group_id">
            <?php
            $result = $conn->query("SELECT * FROM groups");
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['id'] == $data['group_id']) ? 'selected' : '';
                echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
            }
            ?>
        </select><br>
        Negara:
        <select name="country_id">
            <?php
            $result = $conn->query("SELECT * FROM countries");
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['id'] == $data['country_id']) ? 'selected' : '';
                echo "<option value='{$row['id']}' $selected>{$row['name']}</option>";
            }
            ?>
        </select><br>
        Menang: <input type="number" name="win" value="<?= $data['win'] ?>" required><br>
        Seri: <input type="number" name="draw" value="<?= $data['draw'] ?>" required><br>
        Kalah: <input type="number" name="loss" value="<?= $data['loss'] ?>" required><br>
        <button type="submit" name="edit_group">Simpan</button>
    </form>
</body>
</html>
