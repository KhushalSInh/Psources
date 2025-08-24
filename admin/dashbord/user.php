<?php include'./component/secure.php'; ?>

<!DOCTYPE html>
<html lang="en">

<?php include './component/css.php'; ?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
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
                    <a href="user.php" class="nav-item nav-link active"><i class="bi bi-people-fill me-2"></i>Users</a>
                    <a href="admin.php" class="nav-item nav-link"><i class="bi bi-person-fill me-2"></i>Admin</a>
                    <a href="mail.php" class="nav-item nav-link"><i class="bi bi-envelope me-2"></i>Mail</a>
                    <a href="page.php" class="nav-item nav-link"><i class="bi bi-file-break-fill"></i>Page</a>
                    <a href="setting.php" class="nav-item nav-link"><i class="bi bi-gear-fill"></i>Setting</a>

                    <a href="../logout.php" class="nav-item nav-link"><i class="bi bi-box-arrow-in-left me-2 fs-5"></i>Log
                        Out</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include'./component/navbar.php'; ?>
            <!-- Navbar End -->
            <!-- Sale & Revenue End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded h-100 p-4">
                                <h5 class="mb-4">Users</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">UserName</th>
                                            <th scope="col">Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $admin_obj->selectall("users");
                                        $result = $admin_obj->getresult();

                                        foreach ($result as $value) {
                                            ?>
                                            <tr>
                                                <td scope="row"><?php echo $value['id'] ?></td>
                                                <td><?php echo $value['username'] ?></td>
                                                <td><?php echo $value['email'] ?></td>
                                                <form action="" method="post">
                                                    <td><button type="submit" name="user_delete"
                                                            class="btn btn-danger">DELETE</button></td>
                                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                                </form>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                        ?>
                                    </tbody>
                                
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Widgets Start -->

            <!-- Recent Sales End -->

            <!-- Footer Start -->
            <?php include'./component/footer.php'; ?>

            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!--table creation-->

        <!--table end-->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <?php include './component/jslink.php'; 
    
    if (isset($_POST['user_delete'])) {

        $id = $_POST['id'];
        $r = $admin_obj->delete("users", "id = '$id'");

        if (true) {
            ?>
            <script>
                alerts("success", "User Deleted SucessFully", "user.php");
            </script>
            <?php
        }
    }
    ?>
</body>

</html>