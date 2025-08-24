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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include './component/jslink.php'; ?>
    <?php
    ?>
</body>

</html>