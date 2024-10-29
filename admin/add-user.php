<?php
    session_start();
  //muncul/pilih sebuah atau semua kolom dari table user
  include 'connection.php';
  
  //jika button simpan ditekan, POST ambil value CREATE NEW ACCOUNT
  if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //$_POST: form input name=''
    //$_GET: url ?param='nilai'
    //$_FILES: from uploaded files

    if(!empty($_FILES['foto']['name'])){
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];


        //png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        // jika extension foto tidak ada/ tidak sesuai dengan ext yang telah di-declare di array $ext
        if (!in_array($extFoto, $ext)) {
            echo "Ekstensi/jenis file tidak ditemukan. Ekstensi yang diizinkan: " . implode(", ", $extFoto);
            die;
        }else {
            //pindah directory gambar ke folder upload (tmp/temporary path)
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

            $insert = mysqli_query($connection, "INSERT INTO users (nama, email, password, foto) VALUES ('$nama', '$email', '$password','$nama_foto')");

        }
    } else {
        $insert = mysqli_query($connection, "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')");
    }

    header("location:user.php?tambah=berhasil");
  }

  //EDIT/UPDATE ACCOUNT DATA
  $id = isset($_GET['edit']) ? $_GET['edit'] : '';
  $queryEdit = mysqli_query($connection, "SELECT * FROM users WHERE id='$id'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  // when button edit is clicked, insert/update into db
  if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    //jika password diisi oleh user
    if ($_POST['password']) {
        $password = $_POST['password'];
    }else {
        $password = $rowEdit['password'];
    }

    $update = mysqli_query($connection, "UPDATE users SET nama='$nama', email='$email', password='$password' WHERE id='$id'");
    header("location:user.php?ubah=berhasil");
  }
?>


<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/style.css">
    <title>Add User - Portfolio Hana</title>

    <meta name="description" content="" />


</head>

<body>


        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
            <!-- Menu -->
                <?php include 'inc/nav.php'; ?>  
                <?php include 'inc/sidebar.php'; ?>
            <!-- / Menu -->
                <div class="container-xl mt-5 p-4">
                    <fieldset class="border p-3 border-black border-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> User </div>
                                    <div class="card-body">

                                        <?php if(isset($_GET['hapus'])): ?>
                                        <div class="alert alert-success" role="alert">
                                            Data berhasil dihapus!
                                        </div>
                                        <?php endif ?>
                    
                    
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama Anda" required value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>">
                                                </div>
                    
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Masukkan email Anda" required value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                                                </div>
                    
                                                
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="" name="password" placeholder="Masukkan password Anda">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">Foto</label>
                                                    <input type="file" name="foto">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <input value="Simpan" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
             </div>
        </div>



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../assets/admin/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/admin/assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/admin/assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> -->

    <!-- <script src="../assets/admin/assets/vendor/js/menu.js"></script> -->
    <!-- endbuild -->

    <!-- Vendors JS -->
    <!-- <script src="../assets/admin/assets/vendor/libs/apex-charts/apexcharts.js"></script> -->

    <!-- Main JS -->
    <!-- <script src="../assets/admin/assets/js/main.js"></script> -->

    <!-- Page JS -->
    <!-- <script src="../assets/admin/assets/js/dashboards-analytics.js"></script> -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
</body>

</html>