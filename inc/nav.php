<?php
include 'admin/connection.php';

$querySetting = mysqli_query($connection, "SELECT * FROM personal_info ORDER BY id DESC");
$rowSetting = mysqli_fetch_assoc($querySetting);
?>

<nav class="">
    <a href=""><img class="img-nav" src="admin/upload/<?php echo $rowSetting['logo'] ?>" alt=""></a>
    <a href="#about"class="nav_right">About</a>
    <a href="#my-work"class="nav_right">My Work</a>
    <a href="#my-skills"class="nav_right">Skills</a>
    <a href="#contact" class="nav_right">Contact</a>
</nav>