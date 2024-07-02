<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$conn->query("DELETE FROM standings WHERE id='$id'");
header("Location: dashboard.php");
?>
