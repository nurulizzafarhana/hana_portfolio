<?php
 session_start();
  //muncul/pilih sebuah atau semua kolom dari table user
  include 'connection.php';
  
  $queryContact = mysqli_query($connection, "SELECT * FROM form_contact WHERE deleted_at IS NULL");
  //mysqli_fetch_assoc($query) = untuk menjadikan hasil query menjadi sebuah data (object/array)

  //jika parameter ada ?delete=value[id] param
  if (isset($_GET['delete'])) {
    $id = $_GET['delete']; //mengambil nilai params

    //query / perintah hapus
    $delete = mysqli_query($connection, "DELETE FROM form_contact WHERE id='$id'");
    header("location:form-contact-submission.php?hapus=berhasil");
  }
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/style.css">
    <title>Form Data</title>
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

                        <legend class="float-none w-auto px-3">Messages</legend>

                        <!-- <div align="right" class="mb-4">
                            <a href="add-user.php" class="btn btn-primary">Add New User</a>
                        </div> -->

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Messages</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; 
                                $rowContacts = mysqli_fetch_all($queryContact, MYSQLI_ASSOC);
                                foreach ($rowContacts as $rowContact) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $rowContact['nama']; ?></td>
                                        <td><?php echo $rowContact['phone_number']; ?></td>
                                        <td><?php echo $rowContact['email']; ?></td>
                                        <td><?php echo $rowContact['subject']; ?></td>
                                        <td><?php echo $rowContact['message']; ?></td>
                                        <td>
                                            <!-- <a href="kirim-pesan.php?pesanId=<?php echo $rowContact['id'] ?>" class="btn btn-warning btn-sm">
                                                    Reply Message
                                            </a> -->
                                            <a onclick="return confirm('Apakah Anda yakin akan menghapus data ini?')" href="form-contact-submission.php?delete=<?php echo $rowContact['id'] ?>" class="btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
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
