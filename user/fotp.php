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

                                <header class="pb-5">Verify OTP</header>
                                <div class="error">
                                    <?php if ($_GET['error']) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $_GET['error'] ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="input-field">
                                    <input type="tel" class="input" id="email" name="otp" maxlength="6"
                                        autocomplete="off" required>
                                    <label for="email">Enter OTP</label>
                                </div>


                                <div class="input-field">
                                    <button type="submit" name="varify" class="submit" id="blg">Varify</button>
                                </div>

                                <div id="js_timer"><br>
                                    <div>OTP Vild up to <span class="text-danger" id="timer"> </span></div>

                                    <div class="signin">
                                        <!-- <span><a href="login.php">Send OTP Again</a></span><br> -->
                                    </div>

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
    <script>
        function startTimer(duration, display) {
            let start = Date.now(),
                diff,
                minutes,
                seconds;

            function timer() {
                diff = duration - (((Date.now() - start) / 1000) | 0);

                minutes = (diff / 60) | 0;
                seconds = (diff % 60) | 0;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (diff <= 0) {
                    start = Date.now() + 1000;
                }
            }

            timer();
            setInterval(timer, 1000);
        }

        window.onload = function () {
            let savedTime = localStorage.getItem("timerStart");
            let currentTime = Date.now();
            let elapsedTime = (currentTime - savedTime) / 1000;

            if (elapsedTime < 60) {
                startTimer(60 - elapsedTime, document.getElementById("timer"));
            } else {
                startTimer(60, document.getElementById("timer"));
            }

            localStorage.setItem("timerStart", Date.now());
        };

    </script>
</body>

</html>

<?php

?>