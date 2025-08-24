<?php
    session_start();

    setcookie('role_user',$_SESSION['role_user'],time() - (86400 * 11), "/");
    setcookie('id',$_SESSION['id'],time() - (86400 * 10), "/");


    session_destroy();
    session_unset();

    // header("location:index.php");
?>
<script>
    window.location.href="index.php";
</script>