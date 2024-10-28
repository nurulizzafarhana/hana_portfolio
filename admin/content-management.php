<?php
    session_start();
  //muncul/pilih sebuah atau semua kolom dari table user
  include 'connection.php';
  
  $queryPengaturan = mysqli_query($connection, "SELECT * FROM personal_info ORDER BY id DESC");

  //UPDATE
  $rowPengaturan = mysqli_fetch_assoc($queryPengaturan);

  //jika button simpan ditekan, POST ambil value CREATE NEW ACCOUNT
  if (isset($_POST['simpan'])) {
    $nama = mysqli_real_escape_string($connection,$_POST['nama']);
    $nickname = htmlspecialchars($_POST['nickname']);
    $job = htmlspecialchars($_POST['job']);
    $about_first_paragraph = mysqli_real_escape_string($connection,$_POST['about_first_paragraph']);
    $about_second_paragraph = mysqli_real_escape_string($connection,$_POST['about_second_paragraph']);
    $id = $_POST['id'];
    $description = htmlspecialchars($_POST['description']);
    $dribbble_link = $_POST['dribbble_link'];
    $linkedin_link = $_POST['linkedin_link'];
    $github_link = $_POST['github_link'];

    //cari data di tbl general_setting, jika datanya ada akan di-update,
    //jika tidak ada, akan di-insert
    if (mysqli_num_rows($queryPengaturan) > 0) {
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
                unlink('upload/' . $rowPengaturan['logo']);
                move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);

                $update = mysqli_query($connection, "UPDATE personal_info SET nama='$nama', nickname='$nickname', about_first_paragraph='$about_first_paragraph', about_second_paragraph='$about_second_paragraph', job='$job', description='$description', logo='$nama_foto', dribbble_link='$dribbble_link', linkedin_link='$linkedin_link', github_link='$github_link' WHERE id='$id'");

            }
        } else {
            $update = mysqli_query($connection, "UPDATE personal_info SET nama='$nama', nickname='$nickname', about_first_paragraph='$about_first_paragraph', about_second_paragraph='$about_second_paragraph', job='$job', description='$description', dribbble_link='$dribbble_link', linkedin_link='$linkedin_link', github_link='$github_link' WHERE id='$id'");
        }
    }else {
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

                $insert = mysqli_query($connection, "INSERT INTO personal_info (nama, nickname, about_first_paragraph, about_second_paragraph, job, description, logo, dribbble_link, linkedin_link, github_link) VALUES ('$nama','$nickname', '$about_first_paragraph', '$about_second_paragraph', '$job', '$description', '$nama_foto', '$dribbble_link', '$linkedin_link', '$github_link')");

            }
        } else {
            $insert = mysqli_query($connection, "INSERT INTO personal_info (nama, nickname, about_first_paragraph, about_second_paragraph, job, description, dribbble_link, linkedin_link, github_link) VALUES ('$nama', '$nickname', '$about_first_paragraph', '$about_second_paragraph','$job', '$description', '$dribbble_link', '$linkedin_link', '$github_link')");
        }
    }


    //$_POST: form input name=''
    //$_GET: url ?param='nilai'
    //$_FILES: from uploaded files

    header("location:content-management.php");
  }


  //UPDATE
  

  //EDIT/UPDATA ACCOUNT DATA
//   $id = isset($_GET['edit']) ? $_GET['edit'] : '';
//   $queryEdit = mysqli_query($connection, "SELECT * FROM personal_info WHERE id='$id'");
//   $rowEdit = mysqli_fetch_assoc($queryEdit);

//   // when button edit is clicked, insert/update into db
//   if (isset($_POST['edit'])) {
//     $nama = $_POST['nama'];
//     $email = $_POST['email'];

//     //jika password diisi oleh user
//     if ($_POST['password']) {
//         $password = $_POST['password'];
//     }else {
//         $password = $rowEdit['password'];
//     }

//     $update = mysqli_query($koneksi, "UPDATE user SET nama='$nama', email='$email', password='$password' WHERE id='$id'");
//     header("location:user.php?ubah=berhasil");
//   }
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
    <title>Content Management - Portfolio Hana</title>

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
                                <div class="card-header"> Content Settings </div>
                                    <div class="card-body">

                                        <?php if(isset($_GET['hapus'])): ?>
                                        <div class="alert alert-success" role="alert">
                                            Data berhasil dihapus!
                                        </div>
                                        <?php endif ?>
                    
                    
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" class="form-control" name="id" value="<?php echo isset($rowPengaturan['id']) ? $rowPengaturan['id'] : '' ?>">
                                            <div class="mb-3 row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="nama" placeholder="Tell people about yo name" required value="<?php echo isset($rowPengaturan['nama']) ? $rowPengaturan['nama'] : '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Nickname</label>
                                                        <input type="text" class="form-control" name="nickname" placeholder="What can I call ya?" required value="<?php echo isset($rowPengaturan['nickname']) ? $rowPengaturan['nickname'] : '' ?>">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Job</label>
                                                        <input type="text" class="form-control" name="job" placeholder="Tell people about yo job" required value="<?php echo isset($rowPengaturan['job']) ? $rowPengaturan['job'] : '' ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">About - First Paragraph</label>
                                                        <input type="text" class="form-control" name="about_first_paragraph" placeholder="Tell people about yo-self pt.1" required value="<?php echo isset($rowPengaturan['about_first_paragraph']) ? $rowPengaturan['about_first_paragraph'] : '' ?>">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Dribbble Link</label>
                                                        <input type="url" class="form-control" name="dribbble_link" placeholder="Tell people about yo dribbble profile" value="<?php echo isset($rowPengaturan['dribbble_link']) ? $rowPengaturan['dribbble_link'] : '' ?>">
                                                    </div>
                                                    
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Description</label>
                                                        <input type="text" class="form-control" name="description" placeholder="Tell people about yo self" required value="<?php echo isset($rowPengaturan['description']) ? $rowPengaturan['description'] : '' ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">About - Second Paragraph</label>
                                                        <input type="text" class="form-control" name="about_second_paragraph" placeholder="Tell people about yo-self pt.2 (only if u want to!)" value="<?php echo isset($rowPengaturan['about_second_paragraph']) ? $rowPengaturan['about_second_paragraph'] : '' ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">LinkedIn Link</label>
                                                        <input type="url" class="form-control" name="linkedin_link" placeholder="Tell people about yo linkedin profile" value="<?php echo isset($rowPengaturan['linkedin_link']) ? $rowPengaturan['linkedin_link'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">Github Link</label>
                                                    <input type="url" class="form-control" id="" name="github_link" placeholder="Tell people about yo github profile" value="<?php echo isset($rowPengaturan['github_link']) ? $rowPengaturan['github_link'] : '' ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <div class="col-sm-12">
                                                    <label for="" class="form-label">Logo</label>
                                                    <input type="file" name="foto">
                                                    <img width="200" src="upload/<?php echo isset($rowPengaturan['logo']) ? $rowPengaturan['logo'] : '' ?> ">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">Save</button>
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