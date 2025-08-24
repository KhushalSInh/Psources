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
                    <a href="roadmap.php" class="nav-item nav-link active"><i
                            class="bi bi-diagram-2 me-2"></i>RoadMap</a>
                    <a href="youtube.php" class="nav-item nav-link"><i class="bi bi-youtube me-2"></i>Youtube</a>
                    <a href="user.php" class="nav-item nav-link"><i class="bi bi-people-fill me-2"></i>Users</a>
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

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Road map</h6>
                        <button class="btn btn-primary"  data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Add</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Language</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">View</th>
                                    <th scope="col">Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $admin_obj->select("sources","type='road_map'");
                                $res=$admin_obj->getresult();

                                foreach($res as $val){
                                ?>
                                <tr>
                                    <td><?php echo $val['id']; ?></td>
                                    <td><?php echo $val['name']; ?></td>
                                    <td><?php echo $val['language']; ?></td>
                                    <td class="text-center">
                                        <form action="update.php" method="post">
                                                <button type="submit" class="btn btn-info" name="update"><i class="bi bi-pencil-fill"></i></button>
                                                <input type="hidden" name="id" value="<?php echo $val['id'] ?>">
                                                <input type="hidden" name="type" value="<?php echo $val['type'];?>">

                                        </form>
                                    </td>
                                    <td class="text-center">    
                                        <a href="../<?php echo $val['sources']; ?>" target="_blank">
                                            <button class="btn btn-success"><i class="bi bi-eye-fill"></i></button>
                                        </a>
                                    </td>
                                    <td class="text-center">    
                                        <form action="" method="post">
                                            <button type="submit" class="btn btn-danger" name="delete_rm"><i class="bi bi-x-square-fill"></i></button>
                                            <input type="hidden" name="id" value="<?php echo $val['id'] ?>">

                                        </form>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
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


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">New RoadMpa</h5>
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
                                       class="form-control" name="nam" placeholder="Enter Name" minlength="1"
                                       autocomplete="off" value="" required></div>
                                 <div class="col-md-12"><label class="labels">Language</label><input type="text"
                                       class="form-control" placeholder="Enter language name" name="lang" minlength="1"
                                       autocomplete="off" value="" required>
                                 </div>
                                 <div class="col-md-12"><label class="labels">File</label><input type="File"
                                       class="form-control"  name="file1" minlength="1"
                                       autocomplete="off" value="" required>
                                 </div>
                                 <!-- </div> -->
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" name="add_rm" class="btn btn-primary">Add</button>
                  </div>
               </div>
            </div>
         </div>
        </div>
    </form>

    <!-- JavaScript Libraries -->
    <?php include './component/jslink.php'; 
    
    if (isset($_POST['add_rm'])) {

        $name=$_POST['nam'];
        $lang=$_POST['lang'];

         $fn = $_FILES['file1']['name'];
         $path = "../../sources/" . $fn;
         $path2="../sources/".$fn;

         move_uploaded_file($_FILES['file1']['tmp_name'], $path);

        $r = $admin_obj->insert("sources", ['name'=>$name,'type'=>'road_map','language'=>$lang,'sources'=>$path2]);
    
        if (true) {
            ?>
            <script>
                alerts("success", "Add SucessFully", "roadmap.php");
            </script>
            <?php
        }
    }

    if (isset($_POST['delete_rm'])) {

        $id = $_POST['id'];
        $r = $admin_obj->delete("sources", "id = '$id'");

        $file= "../".$val['sources'];

        unlink($file);
    
        if (true) {
            ?>
            <script>
                alerts("success", " Deleted SucessFully", "roadmap.php");
            </script>
            <?php
        }
    }
    
    
    
    ?>
</body>

</html>