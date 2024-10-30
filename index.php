<?php
include 'admin/connection.php';

$queryProject = mysqli_query($connection, "SELECT * FROM projects ORDER BY id DESC LIMIT 4");
$queryShowSkill = mysqli_query($connection,"SELECT * FROM skills ORDER BY id ASC LIMIT 10");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Portfolio</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSS -->
    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/style.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


    <!-- Icons -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  </head>
  <body>

  
    
  
  <!-- NavBar Content -->
  <?php include 'inc/nav.php'; ?>
    <!-- End of NavBar -->

    <div class="pt-5" style="background-color: #f9f5f2;">
      <marquee class="marquee-text bg-texture" width="100%" direction="right" height="20px">
              HELLO HELLO HELLO HELLO HELLO HELLO HELLO HELLO <?php echo $rowSetting['nama'] ?>
      </marquee>
    </div>

    <!-- SUMMARY -->
     <!-- on attribute p_name, h1_job,p_desc, the data is from _GET from db so like, hi phpecho['x'] -->
     <section id="home" class="pt-3" style="background-color: #f9f5f2;">
        <div class="container-fluid">
            <div class="row p-5">
                <div class="col-md-9 col-12 p-5">
                    <p>Hi, I'm <span class="highlight-animation"><?php echo $rowSetting['nama'] ?></span></p>
                    <h1><?php echo $rowSetting['job'] ?></h1>
                    <p><?php echo $rowSetting['description'] ?></p>
                    <!-- A passionate Informatics Management Associate Degree graduate, possessing a strong foundation in web development. -->
                    
                    <button class="green">
                        <a href="https://wa.me/+6285781648897">Start Growing or whatevs</a>
                    </button>
                </div>
                
                <!-- Profile Picture -->
                <div class="col-md-3 text-center">
                    <img src="admin/upload/<?php echo $rowSetting['logo'] ?>" alt="Profile Picture" class="img-fluid" />
                </div>
            </div>
        </div>
     </section>



     <!-- FEATURED PROJECT -->
      <!-- Contents will be uploaded/managed by user, make query LIMIT 2, loop by existed data -->

      <section id="my-work" class="container-xl">
        <div class="row p-2">
          <div class="col-md-12 text-center">
            <h1 class="p-4">FEATURED PROJECT</h1>
          </div>

          <div class="col-md-12 p-4">
            <div class="row">
              <?php while ($rowProject = mysqli_fetch_assoc($queryProject)): ?>
              <div class="col-md-6">
                <div class="row p-3">
                  <div class="card">
                    
                      <div class="col-sm-4">
                        <img src="admin/upload/<?php echo $rowProject['foto'] ?>" alt="...">
                      </div>
                      <div class="row p-3">
                        <div class="col-sm-12">
                          <div class="card-title p-1"><?php echo $rowProject['project_name'] ?></div>
                            <div class="card-body">
                              <p><?php echo $rowProject['project_desc'] ?></p>
                            </div>
                        </div>
                        </div>

                  </div>
                </div>
              </div>
              <?php endwhile ?>
            </div>
          </div>
        </div>
      </section>


      <!-- MY SKILLS -->
      <section id="my-skills" class="container-fluid bg-skills">
        <div class="row p-2">

        <!-- SECTION TITLE -->
          <div class="col-md-12 text-center">
            <h1 class="p-2">SKILLS</h1>
          </div>
        <!-- END -->


            <!-- SECTION CONTENT -->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 d-inline-flex">
                  <ul class="skills-list">
                    <?php while ($rowShowSkill = mysqli_fetch_assoc($queryShowSkill)): ?>
                      <li class="skill-item">
                        <?php echo $rowShowSkill['skill_name'] ?>
                      </li>
                    <?php endwhile ?>
                  </ul>
                </div>
              </div>
            </div>
            <!-- END -->


        </div>
      </section>
      <!-- END OF THIS SECTION -->




      <!-- ABOUT ME MORE -->
      <section id="about" class="pt-3" style="background-color: #f9f5f2;">
        <div class="container-xl">
            <div class="row p-5">

            <div class="col-md-12 text-center">
              <h1 class="p-4">ABOUT</h1>
            </div>

               

                <!-- Study -->
                <div class="col-md-6 col-12 text-center pt-3">
                    <img style="width:300px; height:400px; border: none !important; box-shadow: none;" src="assets/img/study_assets.png" alt="Study Timeline" class="img-fluid" />
                </div>

                <div class="col-md-6 p-5">
                    <p >Hi, I'm <span class="highlight-animation"><?php echo $rowSetting['nickname'] ?></span></p>

                    <p><?php echo $rowSetting['about_first_paragraph'] ?></p>
                    <!-- <p>I am a passionate Informatics Management Associate Degree graduate currently pursuing my Bachelor's Degree in Informatics. With a strong foundation in web development, particularly in front-end technologies, I enjoy creating visually appealing and user-friendly websites.</p> -->

                    <p><?php echo $rowSetting['about_second_paragraph'] ?></p>
                    <!-- <p>I also have a keen interest in design, often exploring creative solutions to enhance user experiences. My journey in the tech field has equipped me with practical experience and insights, enabling me to effectively navigate challenges and innovate solutions in the ever-evolving digital landscape.</p> -->
                    
            
                </div>
                
            </div>
        </div>
      </section>




        <!-- CONTACT ME - FORM -->
        <!-- CRUD FORM -->

        <section id="contact" class="container-md">
          <div class="row p-5">

          <!-- Title -->
            <div class="col-md-12 text-center">
              <h1 class="p-4">CONTACT ME</h1>
            </div>
          <!-- End -->

          <!-- Form Contact -->
           <div class="col-md-12">
            <div class="row">
              <!-- Left Content -->
              <div class="col-md-6">
                <h2>Tell me owekwkeowe woekwoek kocak</h2>
                <br>
                <br>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nobis omnis iure delectus repellat est sunt, nesciunt ipsam odit necessitatibus ut quo itaque modi eligendi magnam eaque minima perferendis tempore.</p>
              </div>

              <!-- Right Content -->
               <div class="col-md-6 p-3">
                <?php
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == "success") {
                            ?>
                            <div class='alert alert-success' role='alert'>Your data has been successfully added! Please wait for a response.</div>
                            <?php
                        } elseif ($_GET['status'] == "email-sudahada") {
                            ?>
                            <div class='alert alert-danger' role='alert'>This email is already in use. Please try a different email</div>
                            <?php
                        }
                    }
                    ?>
                  <form action="form-controller/form-data.php" method="POST">
                            <div class="row">
                                <div class="col-6 p-2">
                                    <input type="text" name="nama" class="form-control mb-3" placeholder="Your Name" />
                                    <input type="email" name="email" class="form-control mb-3" placeholder="E-mail" />
                                    <textarea name="message" cols="30" rows="10" placeholder="Your Messages"></textarea>
                                </div>
                                <div class="col-6 p-2">
                                    <input type="number" name="phone_number" class="form-control mb-3" placeholder="Phone Number" />
                                    <input type="text" name="subject" class="form-control mb-3" placeholder="Subject" />
                                    
                                </div>
                            </div>
                            <input name="send" type="submit" value="Get in touch :D" />
                    </form>
                </div>
            </div>
           </div>

          </div>
        </section>

        <!-- FOOTER get data from user/profile au dah -->
        <?php include 'inc/footer.php'; ?>
        
        
        

  
        

      
  <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
