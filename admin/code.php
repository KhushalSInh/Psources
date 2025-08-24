<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="dashbord/js/sa.js"></script>
    <script src="dashbord/js/sa.js"></script>
    <script src="./dashbord/js/sa.js"></script>



    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
    // error_reporting(0);
    include './dashbord/class/class.php';
    $admin_obj = new Database();


    // if ($_SESSION['role'] == "admin") {
    //     header("location:dashbord/index.php");
    // }
    if (isset($_POST['admin_login'])) {

        $em = $_POST['email'];
        $pass = $_POST['password'];



        $admin_obj->select("admin", "email = '$em'");

        $result = $admin_obj->getResult();
        print_r($result);


        if (!empty($result)) {

            if ($result[0]['email'] == $em) {

                if ($result[0]['password'] == $pass) {

                    $_SESSION['role'] = "admin";
                    $_SESSION['id'] = $result[0]['id'];
                    ?>
                    <script>alerts("sucess", "Login Sucessfully", "dashbord/home.php");</script>
                    <?php

                } else {
                    // header("location:login.php?error=incorrect password");
                    ?>
                    <script>  alert_normal("error", "Incorrect Password"); </script><?php
                }
            } else {
                // header("location:login.php?error=incorrect Email");
                ?>
                <script>  alert_normal("error", "Incorrect Email"); </script><?php

            }
        } else {
            // header("location:login.php?error=Invalid Email and password");
            ?>
            <script>  alert_normal("error", "Incorrect Email and Password"); </script>
            <?php

        }

    }


    // if (isset($_POST['admin_login'])) {
    
    //     $em = $_POST['email'];
    //     $pass = $_POST['password'];
    
    //     if (empty($em)) {
    //         header("location:index.php?error=Username is require");
    //     } elseif (empty($pass)) {
    //         header("location:index.php?error=Password is require");
    
    //     } else {
    
    //         $admin_obj->select("admin", "email = '$em'");
    
    //         $result = $admin_obj->getResult();
    //         print_r($result);
    

    //         if (!empty($result)) {
    //             if ($result[0]['email'] == $email) {
    //                 if ($result[0]['password'] == $pass) {
    //                     $_SESSION['role'] = "admin";
    //                     $_SESSION['id'] = $result[0]['id'];
    
    //                 } else {
    //                     header("location:login.php?error=incorrect password");
    //                 }
    //             } else {
    //                 header("location:login.php?error=incorrect Email");
    //             }
    //         } else {
    //             header("location:login.php?error=Invalid Email and password");
    //         }
    
    //     }
    // }
    

    // reset mail
    if (isset($_POST['reset'])) {


        $em = $_POST['email'];

        $sql = "SELECT * FROM `admin` WHERE email='$em';";
        $qry = mysqli_query($con, $sql);

        $num = mysqli_num_rows($qry);
        $row = mysqli_fetch_array($qry);

        if ($num == 1) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = "reset";
            $otp = rand(000000, 999999);
            setcookie('otp', $otp, time() + (60), "/");
            include 'mail.php';
            include 'a.php';


        } else {
            header("location:Forget_password.php?error=invalid Emial");

        }
    }

    // varify otp
    
    if (isset($_POST['varify'])) {


        $ot = $_POST['otp'];
        $otp = $_COOKIE['otp'];

        if ($ot == $otp) {
            header("location:changepass.php");

        } else {

            header("location:fotp.php?error=invalid OTP");

        }


    }
    // update password
    if (isset($_POST['change'])) {


        $pas = $_POST['pass'];
        $rpas = $_POST['repass'];
        $id = $_SESSION['id'];

        if ($pas == $rpas) {
            unset($_SESSION['password']);
            $sql = "UPDATE `admin` SET `pass` = '$pas' WHERE `admin`.`id` = '$id';";
            $qry = mysqli_query($con, $sql);
            //    include 'a.php';
            unset($_SESSION['id']);


        } else {

            header("location:changepass.php?error=Password Does not Match");

        }


    }


    // profile
    
    ?>
</body>

</html>