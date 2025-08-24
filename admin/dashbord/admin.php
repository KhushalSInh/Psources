<?php include'./component/secure.php'; ?>
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
                        <img class="rounded-circle" src="img/admin.jpg" alt="" style="width: 40px; height: 40px;">
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
                    <a href="admin.php" class="nav-item nav-link active"><i class="bi bi-person-fill me-2"></i>Admin</a>
                    <a href="mail.php" class="nav-item nav-link"><i class="bi bi-envelope me-2"></i>Mail</a>
                    <a href="page.php" class="nav-item nav-link"><i class="bi bi-file-break-fill"></i>Page</a>
                    <a href="setting.php" class="nav-item nav-link"><i class="bi bi-gear-fill"></i>Setting</a>


                    <a href="../logout.php" class="nav-item nav-link"><i
                            class="bi bi-box-arrow-in-left me-2 fs-5"></i>Log Out</a>

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
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-light rounded h-100 p-4">
                                <div class="row">
                                    <span class="fs-4 col-11 col-sm-11 text-black">Admin</span>
                                </div>
                                <div class="row d-flex justify-content-right align-items-right">
                                <button class="col-1 col-sm-1 btn btn-primary " data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Insert</button>
                                </div>
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Update</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $admin_obj->selectall("admin");
                                        $result = $admin_obj->getresult();

                                        foreach ($result as $value) {
                                            ?>
                                            
                                                <td scope="row"><?php echo $value['id'] ?></td>
                                                <td><?php echo $value['name'] ?></td>
                                                <td><?php echo $value['email'] ?></td>
                                                <form action="updateadmin.php" method="post">

                                                    <td><button type="submit" name="update_admin"
                                                            class="btn btn-success" >UPDATE</button></td>
                                                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">

                                                </form>
                                                <form action="" method="post">
                                                    <td><button type="submit" name="admin_delete"
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

            <!-- Widgets Start -->

            <!-- Recent Sales End -->

            <!-- Footer Start -->
            <?php include'./component/footer.php'; ?>

            <!-- Footer End -->
     <form action="" method="post">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">NEW Admin</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                        <div class="container  bg-white">
                           <div class="row">
                              <div class="col-md-5">
                                 <!-- <div class="row"> -->
                              </div>
                              <div class="row">
                                 <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                       class="form-control" name="name" placeholder="Enter Admin Name" minlength="1"
                                       autocomplete="off" value=""></div>
                                 <div class="col-md-12"><label class="labels">Email</label><input type="text"
                                       class="form-control" placeholder="Enter Email" name="email" minlength="1"
                                       autocomplete="off" value="">
                                 </div>
                                 <div class="col-md-12"><label class="labels">Password</label><input type="text"
                                       class="form-control" placeholder="Enter Password" name="password" minlength="1"
                                       autocomplete="off" value="">
                                 </div>
                                 <!-- </div> -->
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" name="add_admin" class="btn btn-primary">Add</button>
                  </div>
               </div>
            </div>
         </div>
        </div>
    </form>
        <!-- Content End -->
      

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
 <!-- JavaScript Libraries -->
 <?php include './component/jslink.php';

if (isset($_POST['add_admin'])) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $Pass=$_POST['password'];
    $r = $admin_obj->insert("admin", ['name'=>$name,'email'=>$email,'password'=>$Pass]);

    if (true) {
        ?>
        <script>
            alerts("success", "Admin Insert SucessFully", "admin.php");
        </script>
        <?php
    }
}

if (isset($_POST['admin_delete'])) {

    $id = $_POST['id'];
    $r = $admin_obj->delete("admin", "id = '$id'");

    if (true) {
        ?>
        <script>
            alerts("success", "Admin Deleted SucessFully", "admin.php");
        </script>
        <?php
    }
}
?>

</body>

</html>