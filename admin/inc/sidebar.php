<?php
include 'connection.php';
$id = $_SESSION['id'];
$queryLogin = mysqli_query($connection, "SELECT * FROM users WHERE id='$id'");
$rowLoginUser = mysqli_fetch_assoc($queryLogin);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../assets/admin/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/admin/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/admin/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../assets/admin/css/style.css">

    <title>Sidebar #1</title>
  </head>
  <body>
  
    
    <aside class="sidebar">
      <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
              <span></span>
            </a>
      </div>
      <div class="side-inner">

        <div class="profile">
          <img src="upload/<?php echo $rowLoginUser['foto'] ?>" alt="Image" class="img-fluid">
          <h3 class="name"><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : '' ?></h3>
          <span class="country">New York, USA</span>
        </div>

        
        <div class="nav-menu">
          <ul>
            <li class="active"><a href="index.php"><span class="icon-home mr-3"></span>Dashboard</a></li>
            <li><a href="logout.php"><span class="icon-sign-out mr-3"></span>Sign out</a></li>
          </ul>
        </div>
      </div>
      
    </aside>
   
    
    
    

    <script src="../assets/admin/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/admin/js/popper.min.js"></script>
    <script src="../assets/admin/js/bootstrap.min.js"></script>
    <script src="../assets/admin/js/main.js"></script>
  </body>
</html>