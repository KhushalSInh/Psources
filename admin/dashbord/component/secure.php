<?php

include 'class/class.php';
$admin_obj = new Database();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
    } else {
        header("location:../index.php");
    }
} else {
    header("location:../index.php");

}

$aid = $_SESSION['id'];
$admin_obj->select("admin", "id = '$aid'");
$res=$admin_obj->getResult();


?>