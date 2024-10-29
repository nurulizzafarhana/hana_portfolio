<?php
require_once "../admin/connection.php";


//ambil data dari input-an form contact
if (isset($_POST['send'])) {
    $nama = mysqli_real_escape_string($connection, $_POST['nama']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);


    //query handle duplicated email
    $select = mysqli_query($connection, "SELECT email FROM form_contact WHERE email = '$email'");

    if (mysqli_num_rows($select) > 0) {
        header("Location: ../index.php?status=email-sudahada&#contact");
        exit();
    } else {
        // query + table_name + (isi kolom table) + VALUES + ()
        $insert = mysqli_query($connection, "INSERT INTO form_contact (nama, phone_number, email, subject, message) VALUES ('$nama', '$phone_number','$email','$subject','$message')");
    
        if ($insert) {
            header("Location: ../index.php?status=success&#contact");
            exit();
        }
    }
}
?>