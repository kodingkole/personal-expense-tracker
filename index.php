<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: dashboard.php");
            exit();
        } else { $error = "Wrong password!"; }
    } else { $error = "User not found!"; }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
<script src="js/script.js"></script>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card p-4 shadow-sm" style="width: 350px;">
    <h2 class="mb-3 text-center">Login</h2>
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST">
        <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
        <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
        <button class="btn btn-primary w-100" name="login">Login</button>
    </form>
    <p class="mt-2 text-center">Don't have an account? <a href="register.php">Register</a></p>
  </div>
</div>
</body>
</html>
