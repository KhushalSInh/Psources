<?php
error_reporting(0);
include './dashbord/class/class.php';

$admin_obj = new Database();
if (isset($_SESSION['role']) || isset($_COOKIE['role'])) {
  if ($_SESSION['role'] == 'admin') {
    header("location:dashbord/home.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <title>PSOURCES</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href=https://fonts.gstatic.com" crossorigin>
  <link href="./dashbord/https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="./dashbord/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="./dashbord/https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="./dashbord/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="./dashbord/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="./dashbord/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="./dashbord/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->

    <!-- Spinner End -->

    <!-- Sign In Start -->
    <div class="container-fluid">
      <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
          <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h3 class="text-primary mx-auto">
                <span style="color: #1ed4d4">P</span><span class="text-dark">SOURCES</span>
              </h3>
              <form action="" method="post">
            </div>
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email"
                required />
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-4">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password"
                required />
              <label for="floatingPassword">Password</label>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-4">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <!-- <a href="forgetpassword.php">Forgot Password</a> -->
            </div>
            <button type="submit" class="btn btn-primary py-3 w-100 mb-1" name="admin_login">
              Sign In
            </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Sign In End -->
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./dashbord/lib/chart/chart.min.js"></script>
  <script src="./dashbord/lib/easing/easing.min.js"></script>
  <script src="./dashbord/lib/waypoints/waypoints.min.js"></script>
  <script src="./dashbord/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="./dashbord/lib/tempusdominus/js/moment.min.js"></script>
  <script src="./dashbord/lib/tempusdominus/js/moment-timezone.min.js"></script>
  <script src="./dashbord/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Template Javascript -->
  <script src="./dashbord/js/main.js"></script>
  <script src="./dashbord/js/sa.js"></script>
  <script>
    function alerts(icon, tit, location) {
      Swal.fire({
        position: "center",
        icon: icon,
        title: tit,
        showConfirmButton: true,
        timer: 3000
      }).then(function () {
        window.location = location;
      });

    }
    function alert_normal(icon, tit) {
      Swal.fire({
        position: "center",
        icon: icon,
        title: tit,
        showConfirmButton: true,
        timer: 3000
      });

    }
  </script>

  <?php
  session_start();
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
          <script>alerts("success", "Login Sucessfully", "dashbord/home.php");</script>
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

  ?>
</body>

</html>