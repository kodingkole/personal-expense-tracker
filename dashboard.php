<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user_id'])) header("Location: index.php");

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM expenses WHERE user_id=$user_id ORDER BY date DESC");


$chart_data = [];
$result_chart = $conn->query("SELECT category, SUM(amount) as total FROM expenses WHERE user_id=$user_id GROUP BY category");
while($row = $result_chart->fetch_assoc()){
    $chart_data[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Expense Tracker</a>
    <div class="ms-auto text-white">
        Hello, <?= $_SESSION['name'] ?> | <a href="logout.php" class="text-white text-decoration-underline">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <div class="d-flex justify-content-between mb-3">
      <h3>Your Expenses</h3>
      <a href="add_expense.php" class="btn btn-success">Add Expense</a>
  </div>

  <table class="table table-striped table-bordered bg-white shadow-sm">
    <thead class="table-primary">
      <tr>
        <th>Category</th>
        <th>Amount</th>
        <th>Description</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()){ ?>
      <tr>
        <td><?= $row['category'] ?></td>
        <td><?= $row['amount'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['date'] ?></td>
        <td>
          <a href="edit_expense.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
          <a href="delete_expense.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

  <h3 class="mt-5">Expenses Summary by Category</h3>
  <canvas id="expenseChart" width="400" height="200" class="bg-white p-3 shadow-sm rounded"></canvas>
</div>

<script>
const ctx = document.getElementById('expenseChart').getContext('2d');
const data = {
    labels: <?= json_encode(array_column($chart_data, 'category')) ?>,
    datasets: [{
        label: 'Total Expenses',
        data: <?= json_encode(array_column($chart_data, 'total')) ?>,
        backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)'
        ]
    }]
};
new Chart(ctx, { type: 'pie', data: data });
</script>
</body>
</html>
