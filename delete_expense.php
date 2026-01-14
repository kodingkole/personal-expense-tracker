<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])) header("Location: index.php");

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM expenses WHERE id=? AND user_id=?");
$stmt->bind_param("ii", $id, $_SESSION['user_id']);
$stmt->execute();
$stmt->close();

header("Location: dashboard.php");
?>
