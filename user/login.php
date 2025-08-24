<?php
// include 'component/s.php';
include 'class/class.php';
error_reporting(0);

if (!isset($_SESSION['role_user']) || !isset($_COOKIE['role_user'])) {
    header("location" . $_SERVER['PHP_SELF']);
} else {
    $_SESSION['role_user'] = $_COOKIE['role_user'];
    $_SESSION['id'] = $_COOKIE['id'];
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
    <title>PSOURCES</title>

</head>

<body>
<script>
   if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
   }
</script>
    <form action="" method="post">
        <div class="wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image"></div>
                    <div class="col-md-6 right">

                        <div class="input-box">

                            <header style="margin-bottom: 45px;">Login</header>
                            <div class="error">
                                <?php if ($_GET['error']) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $_GET['error'] ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="input-field">
                                <input type="email" class="input" id="email" name="email" autocomplete="off" autofocus
                                    >
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field">
                                <input type="password" class="input" minlength="1" id="pass" name="pass" >
                                <label for="pass">Password</label>
                            </div>
                            <div class="input-field">
                                <button type="submit" name="user_login" class="submit" id="blg">Login</button>
                            </div>
                            <div class="signin">
                                <span> create a new account? <a href="singup.php">Create here</a></span><br><br>

                                <span><a href="forget_password.php">Forget Your Password ?</a></span><br>
                                <span>Goto ?<a href="index.php" class="pt-3">Home</a></span><br>



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<?php include 'component/js.php'; ?>
</html>
<?php
if(isset($_POST['user_login'])){

    $user_obj = new user();
    
    $email = $_POST['email'];
    $password = $_POST['pass'];


    $result = $user_obj->login($email,$password);

    if($result){                         
        ?>
        <script>
            alert("success","Login successfully","index.php");
        </script>
        <?php
    }

}

?>
