<?php include './component/secure.php';

if (isset($_POST['update_admin'])) {
    $uaid = $_POST['id'];

    $admin_obj->select("admin", "id = '$uaid'");
    $r1 = $admin_obj->getResult();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include './component/css.php'; ?>

<body>

    <!-- < class="container-xxl position-relative bg-white d-flex p-0"> -->
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-light navbar-light">
            <a href="index.html" class="navbar-brand mx-4 mb-3">
                <h3><span style="color:#1Ed4d4">P</span><span class="text-black">SOURCES</span></h3>
            </a>
            <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div
                        class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                    </div>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0"><?php echo $res[0]['name'] ?></h6>
                    <span>Admin</span>
                </div>
            </div>
            <div class="navbar-nav w-100">
                <a href="home.php" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="cheetsheet.php" class="nav-item nav-link "><i class="fa fa-th me-2"></i>CheetSheets</a>
                <a href="note.php" class="nav-item nav-link"><i class="bi bi-book-half me-2"></i>Notes</a>
                <a href="pidea.php" class="nav-item nav-link"><i class="bi bi-lightbulb-fill me-2"></i>Project
                    Ideas</a>
                <a href="roadmap.php" class="nav-item nav-link"><i class="bi bi-diagram-2 me-2"></i>RoadMap</a>
                <a href="youtube.php" class="nav-item nav-link"><i class="bi bi-youtube me-2"></i>Youtube</a>
                <a href="user.php" class="nav-item nav-link"><i class="bi bi-people-fill me-2"></i>Users</a>
                <a href="admin.php" class="nav-item nav-link "><i class="bi bi-person-fill me-2"></i>Admin</a>
                <a href="mail.php" class="nav-item nav-link"><i class="bi bi-envelope me-2"></i>Mail</a>
                <a href="page.php" class="nav-item nav-link"><i class="bi bi-file-break-fill"></i>Page</a>
                <a href="setting.php" class="nav-item nav-link active"><i class="bi bi-gear-fill"></i>Setting</a>

                <a href="../logout.php" class="nav-item nav-link"><i class="bi bi-box-arrow-in-left me-2 fs-5"></i>Log
                    Out</a>

            </div>
        </nav>
    </div>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <?php include './component/navbar.php'; ?>

        <!-- Navbar End -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <div class="row">
                                <span class="fs-4 col-11 col-sm-11 text-black pb-5">Chanage Password</span>
                            </div>
                            <div class="container">
                                <form action="" method="post">
                                    <div class="form-group text-start">
                                        <label for="" class="px-3 mb-2 mt-2 fs-5 fw-bold">Old Password:</label>
                                        <input type="text" class="form-control" name="oldpass">
                                    </div>
                                    <div class="form-group text-start">
                                        <label for="" class="px-3 mb-2 mt-2 fs-5 fw-bold">New Password:</label>
                                        <input type="text" class="form-control" name="newpass">
                                    </div>
                                    <div class="form-group text-start">
                                        <label for="" class="px-3 mb-2 mt-2 fs-5 fw-bold">Repeat Password:</label>
                                        <input type="text" class="form-control" name="reppas">
                                    </div>

                                    <div class="form-group mt-5 row">
                                        
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success fs-5"
                                                name="change_pass">Chnage</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <!-- JavaScript Libraries -->
    <?php include './component/jslink.php';

    if (isset($_POST['change_pass'])) {

        $old_pass = $_POST['oldpass'];
        $New_pass = $_POST['newpass'];
        $Repet_pass = $_POST['reppas'];

        $id=$_SESSION['id'];

        $admin_obj->select("admin","id='$id'");
        $res=$admin_obj->getresult();

        if($old_pass==$res[0]['password']){

            if($New_pass==$Repet_pass){

                $r = $admin_obj->update('admin', ['password' => $New_pass], "id ='$id'");
                $rr = $admin_obj->getresult();
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