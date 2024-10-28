<?php
include 'admin/connection.php';

$querySetting = mysqli_query($connection, "SELECT * FROM personal_info ORDER BY id DESC");
$rowSetting = mysqli_fetch_assoc($querySetting);
?>
<div class="container-fluid">
          <div class="row p-2">
            <div class="col-md-12">
              <footer>
                <div class="row">

                  <div class="col-md-12">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <a href="<?php echo $rowSetting['dribbble_link'] ?>" target="_blank"><i class="fab fa-dribbble"></i></a>
                            <a href="<?php echo $rowSetting['linkedin_link'] ?>/" target="_blank"><i class="fab fa-linkedin"></i></a>
                            <a href="<?php echo $rowSetting['github_link'] ?>" target="_blank"><i class="fab fa-github"></i></a>
                        </div>

                        <span>
                        © 2024
                          <a href="index.php"><?php echo $rowSetting['nickname'] ?></a>
                        </span>

                    </div>
                  </div>

                  
                </div>
              </footer>
            </div>
          </div>
        </div>