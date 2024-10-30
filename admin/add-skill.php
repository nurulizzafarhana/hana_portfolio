<?php
session_start();
include 'connection.php';

if (isset($_POST['simpan'])) {
    $skill_name = mysqli_real_escape_string($connection, $_POST['skill_name']);

    // Insert skill_name ke dalam tabel skills
    $insert = mysqli_query($connection, "INSERT INTO skills (skill_name) VALUES ('$skill_name')");
    
    // Redirect ke halaman skills setelah berhasil menyimpan data
    header("location:skills.php?tambah=berhasil");
    exit();
}

// Ambil data skill untuk diedit jika ada parameter 'edit' di URL
$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($connection, "SELECT * FROM skills WHERE id='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

// Proses update skill_name jika tombol edit ditekan
if (isset($_POST['edit'])) {
    $skill_name = mysqli_real_escape_string($connection, $_POST['skill_name']);

    // Update skill_name di tabel skills
    $update = mysqli_query($connection, "UPDATE skills SET skill_name='$skill_name' WHERE id='$id'");
    
    // Redirect ke halaman skills setelah berhasil mengubah data
    header("location:skills.php?ubah=berhasil");
    exit();
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
    <title>Add Skills - Portfolio Hana</title>

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
                                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Skill </div>
                                    <div class="card-body">

                                        <?php if(isset($_GET['hapus'])): ?>
                                        <div class="alert alert-success" role="alert">
                                            Data berhasil dihapus!
                                        </div>
                                        <?php endif ?>
                    
                    
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <label for="" class="form-label">Skill Name</label>
                                                    <input type="text" class="form-control" name="skill_name" placeholder="Tell people about yo skill" required value="<?php echo isset($_GET['edit']) ? $rowEdit['skill_name'] : '' ?>">
                                                </div>
                                            </div>
                                
                                            <div class="mb-3">
                                                <input value="Save" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">
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