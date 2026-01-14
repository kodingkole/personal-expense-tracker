<?php
include 'db.php';
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    if($stmt->execute()){
        header("Location: index.php");
    } else {
        $error = "Error: ".$stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card p-4 shadow-sm" style="width: 350px;">
    <h2 class="mb-3 text-center">Register</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <input class="form-control mb-2" type="text" name="name" placeholder="Full Name" required>
        <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
        <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
        <button class="btn btn-primary w-100" name="register">Register</button>
    </form>
    <p class="mt-2 text-center">Already have an account? <a href="index.php">Login</a></p>
  </div>
</div>
</body>
</html>
