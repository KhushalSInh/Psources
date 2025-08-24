<nav class="navbar navbar-expand-lg">
    <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a href="index.html" class="navbar-brand mx-auto mx-lg-0"><span
                style="color:rgb(30, 212, 212);">P</span>SOURCES</a>

        <div class="d-flex align-items-center d-lg-none">
        <?php
                if (isset($_SESSION['role_user']) || isset($_COOKIE['role_user'])) {

                    if ($_SESSION['role_user'] == 'user' || $_COOKIE['role_user'] == 'user') {
                        ?>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="image/user.png" alt="" width="40px" height="40px"></a>
                             <div class="dropdown-menu m-0">
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#prifile">Myprofile</a> -->
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#password">Chnage Password</a> -->
                                <a href="logout.php" class="dropdown-item ">Logout</a>
                            </div>
            
                        </div>
                        <?php

                    }

                } else {
                    ?>
                        <a class="custom-btn btn" href="login.php">
                            Login
                        </a>
                    
                    <?php

                }
                ?>
           </div>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_1">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_3">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_4">Pages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="index.php#section_5">Contact</a>
                </li>
                <div class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Resouces</a>
                    <div class="dropdown-menu m-0">
                    <?php
                            include './component/connection.php';
                            $sql="select distinct type from sources";
                            $result=mysqli_query($con,$sql);

                             while($row=mysqli_fetch_assoc($result))
                            {?>
                             <a href="resouces.php?id=<?php echo $row['type']; ?>" class="dropdown-item  "><?php echo $row['type']; ?></a>
                          <?php
                        }?>
                        
                       </div>
                </div>
               
            </ul>

            <div class="d-lg-flex align-items-center d-none ms-auto " >

                <?php
                if (isset($_SESSION['role_user']) || isset($_COOKIE['role_user'])) {

                    if ($_SESSION['role_user'] == 'user' || $_COOKIE['role_user'] == 'user') {
                        ?>
                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img src="image/user.png" alt="" width="40px" height="40px"></a>
                             <div class="dropdown-menu m-0">
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#prifile">Myprofile</a> -->
                                <!-- <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#password">Chnage Password</a> -->
                                <a href="logout.php" class="dropdown-item ">Logout</a>
                            </div>
            
                        </div>
                        <?php

                    }

                } else {
                    ?>
                    <div class="">
                        <a class="custom-btn btn" href="login.php">
                            Login
                        </a>
                    </div>
                    <?php

                }
                ?>
            </div>
        </div>

    </div>
</nav>