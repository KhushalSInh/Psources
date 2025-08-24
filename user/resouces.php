<?php
session_start();
error_reporting(0);
include 'class/class.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include './component/css.php'; ?>
<script>
   if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
   }
</script>
<body>
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
                <a class="custom-btn btn" href="login.php">
                    Login
                </a>
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
                    <li class="nav-item active">
                        <a class="nav-link active" href="resouces.php">Resouces</a>
                    </li>
                </ul>

                <div class="d-lg-flex align-items-center d-none ms-auto ">

                    <?php
                    if (isset($_SESSION['role_user']) || isset($_COOKIE['role_user'])) {

                        if ($_SESSION['role_user'] == 'user' || $_COOKIE['role_user'] == 'user') {
                            ?>
                            <div class="">
                            <div class="nav-item dropdown">
                                 <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="image/user.png" alt="" width="40px" height="40px"></a>
                             <div class="dropdown-menu m-0">
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#prifile">Myprofile</a> -->
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#password">Chnage Password</a> -->
                                <a href="logout.php" class="dropdown-item ">Logout</a>
                            </div>
            
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
                <form action="" method="post">
                    <div class="col-lg-7 c">
                        <div class="hero-text">
                            <div class="hero-title-wrap d-flex align-items-center mb-4">
                            </div>
                            <div class="container wh-100 div1">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Language</label>

                                    <select class="form-select" name="resources" >

                                      <?php
                                            include './component/connection.php';
                                            $res=$_GET['id'];
                                            
                                            $sql="select language from sources where type='$res';";

                                            $result=mysqli_query($con,$sql);

                                            while($row=mysqli_fetch_assoc($result))
                                            {?>
                                                 <option value="<?php echo $row['language']; ?>"><?php echo $row['language']; ?></option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="find">Get</button>
                                </div>

                            <?php
                                if(isset($_POST['find'])){

                                    if(!isset($_SESSION['role_user']) || !isset($_COOKIE['role_user']))
                                    {
                                        ?>
                                        <script>
                                            alert_normal("error", "Login  is  Required",);
                                        </script>
                                        <?php
                                    }else{

                                        $r=$_POST['resources'];
                                        $res=$_GET['id'];

                                        $db=new Database();
                                        $db->select("sources","type='$res' AND language='$r'");
                                        $result=$db->getresult();
                                        ?>
                                        <a href="<?php echo $result[0]['sources'] ?>" download="" class="btn btn-outline-dark mt-5 mx-4">Dawnload</a>
                                        <?php
                                        
                                    }
                                    }?>

                            </div>
                            </div>
                        </div>
                    </div>
                </form>    
                </div>
            </div>
            </div><br><br>
            

           


            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#535da1" fill-opacity="1"
                    d="M0,160L24,160C48,160,96,160,144,138.7C192,117,240,75,288,64C336,53,384,75,432,106.7C480,139,528,181,576,208C624,235,672,245,720,240C768,235,816,213,864,186.7C912,160,960,128,1008,133.3C1056,139,1104,181,1152,202.7C1200,224,1248,224,1296,197.3C1344,171,1392,117,1416,90.7L1440,64L1440,0L1416,0C1392,0,1344,0,1296,0C1248,0,1200,0,1152,0C1104,0,1056,0,1008,0C960,0,912,0,864,0C816,0,768,0,720,0C672,0,624,0,576,0C528,0,480,0,432,0C384,0,336,0,288,0C240,0,192,0,144,0C96,0,48,0,24,0L0,0Z">
                </path>
            </svg>
    </main>

        <?php include './component/js.php'; 
        
        if(isset($_POST['find'])){

            if(!isset($_SESSION['role_user']) || !isset($_COOKIE['role_user']))
            {
                ?>
                <script>
                     alert_normal("error", "Login  is  Required",);
                </script>
                <?php
            }else{
                $r=$_POST['resources'];
                $res=$_GET['id'];

                $db=new Database();
                $db->select("sources","type='$r' AND language='$res'");
                $result=$db->getresult();
                
            }
            
        }
        
        
        ?>
</body>

</html>