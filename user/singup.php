<?php
include 'class/class.php';
include 'component/js.php'; 
error_reporting(0);
if (!isset($_SESSION['role_user']) || !isset($_COOKIE['role_user'])) {
    header("location" . $_SERVER['PHP_SELF']);
} else {
    $_SESSION['role_user'] = $_COOKIE['role_user'];
    // $_SESSION['id'] = $_COOKIE['id'];
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>

</head>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>

<body>
    <div class="ocean">
        <div class="wave"></div>
        <div class="wave"></div>
        <form action="" method="post">
            <div class="wrapper">
                <div class="container main">
                    <div class="row">
                        <div class="col-md-6 side-image">
                        </div>
                        <div class="col-md-6 right">
                            <div class="input-box">
                                <div class="error">
                                    <?php if ($_GET['error']) { ?>
                                        <div class="al" role="alert"> <script>alert_normal("error","An Email is Allredy Exist");</script></div> <?php } ?>
                                </div>
                                

                                <header class="pb-5">Singup</header>

                                <div class="input-field">
                                    <input type="text" class="input" id="name" name="name" autocomplete="off" autofocus
                                        required>
                                    <label for="email">Name</label>
                                </div>
                                <!-- <div class="input-field">
                                    <input type="number" class="input" id="mobile" name="mobile" autocomplete="off"
                                        required>
                                    <label for="email">Mobile</label>
                                </div> -->

                                <div class="input-field">
                                    <input type="email" class="input" id="email" name="email" autocomplete="off"
                                        required>
                                    <label for="email">Email</label>

                                </div>
                                <div class="input-field">
                                    <input type="password" class="input" id="pass" name="pass" required>
                                    <label for="pass">Password</label>
                                </div>
                                <div class="input-field">
                                    <button type="submit" name="singup" class="submit" id="blg">Singup</button>

                                </div>
                                <div class="signin">
                                    <span> i have an account? <a href="login.php">Login</a></span><br><br>

                                    <span>Goto ?<a href="index.php" class="pt-3">Home</a></span><br>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<?php

if(isset($_POST['singup']))
   {

    $username = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $user_obj = new user();

    $result = $user_obj->singup($username,$email,$password);

    if($result){
        $_SESSION['role_user'] = "user";
          setcookie('role_user',$_SESSION['role_user'],time() + (86400 * 10), "/"); 
          include './mail.php';                         
        ?>
        <script>
            alert("success","Account Created successfully","index.php");
        </script>
        <?php
    }
   }
                               
     
?>

                                    