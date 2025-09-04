<?php
 session_start();
 session_regenerate_id();
 error_reporting(0);

 if(!isset($_SESSION['role_user']) || !isset($_COOKIE['role_user']))
 {
    header("location".$_SERVER['PHP_SELF']);
 }else{
   $_SESSION['role_user']=$_COOKIE['role_user'];
   $_SESSION['id']=$_COOKIE['id'];
 }


include 'class/class.php';
$db= new Database();
$db->select("page","id=1");
$res1=$db->getresult();
?>
<!doctype html>
<html lang="en">

<?php include './component/css.php'; ?>
<body>
<script>
   if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
   }
</script>

    <section class="preloader">
        <div class="spinner">
            <span class="spinner-rotate"></span>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="index.html" class="navbar-brand mx-auto mx-lg-0"><span
                style="color:rgb(30, 212, 212);">P</span>SOURCES</a>

        <div class="d-flex align-items-center d-lg-none">
        <?php
                if (isset($_SESSION['role_user']) || isset($_COOKIE['role_user'])) {

                    if ($_SESSION['role_user'] == 'user' || $_COOKIE['role_user'] == 'user') {
                        ?>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="image/user.png" alt="" width="40px" height="40px"></a>
                             <div class="dropdown-menu m-0">
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#prifile">Myprofile</a> -->
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#password">Chnage Password</a> -->
                                <a href="logout.php" class="dropdown-item ">Logout</a>
                            </div>
            
                        </div>
                        <?php

                    }

                } else {
                    ?>
                        <a class="custom-btn btn" href="login.php">
                            Login
                        </a>
                    
                    <?php

                }
                ?>
           </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_1">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_3">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_4">Pages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_5">Contact</a>
                </li>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Resouces</a>
                    <div class="dropdown-menu m-0">
                    <?php
                            include './component/connection.php';
                            $sql="select distinct type from sources";
                            $result=mysqli_query($con,$sql);

                             while($row=mysqli_fetch_assoc($result))
                            {?>
                             <a href="resouces.php?id=<?php echo $row['type']; ?>" class="dropdown-item  "><?php echo $row['type']; ?></a>
                          <?php
                        }?>
                        
                       </div>
                </div>
               
            </ul>

            <div class="d-lg-flex align-items-center d-none ms-auto " >

                <?php
                if (isset($_SESSION['role_user']) || isset($_COOKIE['role_user'])) {

                    if ($_SESSION['role_user'] == 'user' || $_COOKIE['role_user'] == 'user') {
                        ?>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="image/user.png" alt="" width="40px" height="40px"></a>
                             <div class="dropdown-menu m-0">
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#prifile">Myprofile</a> -->
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#password">Chnage Password</a> -->
                                <a href="logout.php" class="dropdown-item ">Logout</a>
                            </div>
            
                        </div>
                        <?php

                    }

                } else {
                    ?>
                    <div class="">
                        <a class="custom-btn btn" href="login.php">
                            Login
                        </a>
                    </div>
                    <?php

                }
                ?>
            </div>
        </div>

    </div>
</nav>

    <main>

        <section class="hero d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-7 col-12">
                        <div class="hero-text">
                            <div class="hero-title-wrap d-flex align-items-center mb-4">
                                <img src="images/images (1).png"
                                    class="avatar-image avatar-image-large img-fluid" alt="">

                                <h1 class="hero-title ms-3 mb-0">Hello friend!</h1>
                            </div>

                            <h2 class="mb-4">Matser in Web Devlopment.</h2>
                            <p class="mb-4"><a class="custom-btn btn custom-link" href="#section_2">Let's begin</a></p>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12 position-relative">
                        <div class="hero-image-wrap"></div>
                        <img src="images/portrait-happy-excited-man-holding-laptop-computer.png"
                            class="hero-image img-fluid" alt="">
                    </div>

                </div>
            </div>

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#535da1" fill-opacity="1"
                    d="M0,160L24,160C48,160,96,160,144,138.7C192,117,240,75,288,64C336,53,384,75,432,106.7C480,139,528,181,576,208C624,235,672,245,720,240C768,235,816,213,864,186.7C912,160,960,128,1008,133.3C1056,139,1104,181,1152,202.7C1200,224,1248,224,1296,197.3C1344,171,1392,117,1416,90.7L1440,64L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
                </path>
            </svg>
        </section>

        <?php include './user/component/about.php'; ?>

        <?php include './user/component/infromation.php'; ?>

        <?php include './user/component/popularyt.php'; ?>
        
        <?php include './user/component/services.php'; ?>

        <?php include './user/component/language.php'; ?>

        <?php include './user/component/contactus.php'; ?>

    </main>

    <?php include './user/component/footer.php'; ?>

    <?php include './user/component/js.php'; ?>

    <form action="" method="post">
            <div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Chnage Password</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                        <div class="container  bg-white">
                           <div class="row">
                              <div class="col-md-5">
                                 <!-- <div class="row"> -->
                              </div>
                              <div class="row">
                                 <div class="col-md-12"><label class="labels">Old Password</label><input type="text"
                                       class="form-control" name="oldpass" placeholder="Enter Old password" minlength="1"
                                       autocomplete="off" value="" required></div>
                                 <div class="col-md-12"><label class="labels">New Password</label><input type="text"
                                       class="form-control" placeholder="Enter New Password" name="newpass" minlength="1"
                                       autocomplete="off" value="" required>
                                 </div>
                                 <div class="col-md-12"><label class="labels">Repet Password</label><input type="text"
                                       class="form-control" placeholder="Repet New Password" name="reppas" minlength="1"
                                       autocomplete="off" value="" required>
                                 </div>
                                
                                 </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" name="change" class="btn btn-primary">Change</button>
                  </div>
               </div>
            </div>
         </div>
        </div>
    </form>

    <?php

               
        if(isset($_POST['send'])){

                    if(!isset($_SESSION['role_user']) || !isset($_COOKIE['role_user']))
                    {
                        ?>
                        <script>
                            alert_normal("error", "Login  is  Required",);
                        </script>
                        <?php
                    }
                    else{
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $msg=$_POST['message'];

                    $db->insert("contact_us",['user_id'=>$_SESSION['id'],'name'=>$name,'email'=>$email,'message'=>$msg]);
                    $res2=$db->getresult();
                    echo " <script>alert_normal('success', 'Request Send SucessFully',);</script>";

                    if ($res2) {
                        include 'mail.php';
                        ?>
                        <script>
                            alert_normal("success", "Request Send SucessFully",);
                        </script>
                        <?php
                    }
                }
        }

        if (isset($_POST['change'])) {

            $old_pass = $_POST['oldpass'];
            $New_pass = $_POST['newpass'];
            $Repet_pass = $_POST['reppas'];
    
            $id=$_COOKIE['id'];

            $userobj=new user();
            $userobj->select("users","id='$id'");
            $res=$userobj->getresult();

            $iv=hex2bin($result[0]['iv']);
            $psw=$userobj->str_openssl_dec($res[0]['password'],$iv);

 
    
            if($old_pass==$psw){
    
                if($New_pass==$Repet_pass){
    
                    $r = $userobj->update('users', ['password' => $New_pass], "id ='$id'");
                    $rr = $userobj->getresult();
                    if ($rr) {
                        ?>
                        <script>
                            alert_normal("success", "Password Chnage Successfully SucessFully");
                        </script>
                        <?php
                    }
    
                }else{
                    ?>
                    <script>
                        alert_normal("error", "New and Repet Password Does Not Match",);
                    </script>
                    <?php
                }
    
            }else{
                ?>
                <script>
                    alert_normal("error", "Wrong Old Password",);
                </script>
                <?php
            }
            
        }
     ?>

</body>

</html>