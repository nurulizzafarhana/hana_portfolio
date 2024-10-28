<?php
session_start();
session_regenerate_id();
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
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
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
      <?php include 'inc/nav.php' ?>  

      <?php include 'inc/sidebar.php' ?>
        <!-- / Menu -->

        
      </div>

      <div class="container-xl mt-5 p-5 flex-grow-1 container-p-y bg-texture">
          <h1>Welcome, <?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : '' ?>!</h1>
      </div>
    </div>
         

  </body>
</html>

