<?php
session_start();
session_destroy();
session_unset();
// echo "krfdjn";
// header("location:../Admin/login.php");
header("location:index.php");

?>