<?php
include 'component/s.php';
if (isset($_SESSION['password'])) {

  if ($_SESSION['password'] == "reset") {

  } else {
    header("location:login.php");
  }
} else {
  header("location:login.php");
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
  <title>Fast food</title>

</head>

<body>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <div class="ocean">
    <div class="wave"></div>
    <div class="wave"></div>
    <form action="code.php" method="post">
      <div class="wrapper">
        <div class="container main">
          <div class="row">
            <div class="col-md-6 side-image"></div>
            <div class="col-md-6 right">

              <div class="input-box">

                <header>Change Password</header>
                <div class="error">
                  <?php if ($_GET['error']) { ?>
                    <div class="alert alert-danger" role="alert">
                      <?= $_GET['error'] ?>
                    </div>
                  <?php } ?>
                </div>

                <div class="input-field">
                  <input type="text" class="input" id="email" name="pass" minlength="8" autocomplete="off" required>
                  <label for="email">Enter New Password</label>
                </div>

                <div class="input-field">
                  <input type="text" class="input" id="pass" name="repass" minlength="8" required>
                  <label for="pass">Repet Password</label>
                </div>
                <div class="input-field">
                  <button type="submit" name="change" class="submit" id="blg">Change</button>
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