<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])) header("Location: index.php");

if(isset($_POST['add'])){
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO expenses (user_id, category, amount, description, date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isdss", $user_id, $category, $amount, $description, $date);
    $stmt->execute();
    $stmt->close();

    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
    <title>Add Expense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Expense Tracker</a>
    <div class="ms-auto text-white">
        Hello, <?= $_SESSION['name'] ?> | <a href="logout.php" class="text-white text-decoration-underline">Logout</a>
    </div>
  </div>
</nav>

<div class="container d-flex justify-content-center mt-5">
  <div class="card p-4 shadow-sm" style="width: 400px;">
    <h2 class="mb-3 text-center">Add Expense</h2>
    <form method="POST">
        <input class="form-control mb-2" type="text" name="category" placeholder="Category" required>
        <input class="form-control mb-2" type="number" step="0.01" name="amount" placeholder="Amount" required>
        <input class="form-control mb-2" type="text" name="description" placeholder="Description">
        <input class="form-control mb-2" type="date" name="date" required>
        <button class="btn btn-success w-100" name="add">Add Expense</button>
    </form>
    <a href="dashboard.php" class="btn btn-secondary w-100 mt-2">Back to Dashboard</a>
  </div>
</div>
</body>
</html>
