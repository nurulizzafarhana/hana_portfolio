<?php
 session_start();
  //muncul/pilih sebuah atau semua kolom dari table user
  include 'connection.php';
  
  $queryUser = mysqli_query($connection, "SELECT * FROM users");
  //mysqli_fetch_assoc($query) = untuk menjadikan hasil query menjadi sebuah data (object/array)

  //jika parameter ada ?delete=value[id] param
  if (isset($_GET['delete'])) {
    $id = $_GET['delete']; //mengambil nilai params

    //query / perintah hapus
    $delete = mysqli_query($connection, "DELETE FROM users WHERE id='$id'");
    header("location:user.php?hapus=berhasil");
  }
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/style.css">
    <title>Dashboard Management</title>
    <meta name="description" content="" />
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include 'inc/nav.php'; ?>  
            <?php include 'inc/sidebar.php'; ?>
            <!-- / Menu -->

            <div class="content">
                <div class="container-xl mt-5 p-5">
                    <fieldset class="border p-3 border-black border-3">
                        <?php if(isset($_GET['hapus'])): ?>
                                <div class="alert alert-success" role="alert">
                                        Data berhasil dihapus!
                                </div>
                        <?php endif ?>

                        <legend class="float-none w-auto px-3">User Management</legend>

                        <div align="right" class="mb-4">
                            <button class="" onclick="window.location.href='add-user.php';">Add New User</button>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Photos</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; while ($user = mysqli_fetch_assoc($queryUser)): ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $user['nama']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                        <td>
                                            <img src="upload/<?php echo $user['foto']; ?>" alt="User Photo" style="width: 100px; height: 100px;">
                                        </td>
                                        <td>
                                            <a href="add-user.php?edit=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="user.php?delete=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
