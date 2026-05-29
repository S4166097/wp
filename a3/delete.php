<?php
session_start();
include 'includes/db_connect.inc';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    die("No pet selected.");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
    
$stmt = $conn->prepare("DELETE FROM pets WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $user_id);

if ($stmt->execute()) {
    header("Location: owner.php?user_id=" . $user_id);
    exit();
}

echo "Delete failed.";
?>