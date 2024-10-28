<?php
session_start();
include 'connection.php';
if(isset($_POST['login'])){
  $email = $_POST['email']; //untuk mengambil nilai dari input
  $password = $_POST['password'];

  $queryLogin = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
  // mysqli_num_row() : untuk melihat total data di dalam table
  if(mysqli_num_rows($queryLogin) > 0) {
    $rowLogin = mysqli_fetch_assoc($queryLogin);
    if ($password == $rowLogin['password']) {
      $_SESSION['nama'] = $rowLogin['nama'];
      $_SESSION['id'] = $rowLogin['id'];
      header("location:index.php");
    } else {
      header("location:login.php?login=gagal");
    }
  } else {
    header("location:login.php?login=gagal");
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css"> <!-- CSS Kustom -->
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="min-height: 100vh; align-items: center;">
            <div class="col-4">
                <h2 class="text-center">Login</h2>
                <form method="POST" action=""> <!-- Ganti dengan file proses login Anda -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button name="login" type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
