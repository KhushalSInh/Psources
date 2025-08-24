<?php
   include 'component/connection.php';
    session_start();
    session_regenerate_id();
    error_reporting(0);
 
    if(!isset($_SESSION['role_user']) || !isset($_COOKIE['role_user']))
    {
       header("location".$_SERVER['PHP_SELF']);
    }else{
      $_SESSION['role_user']=$_COOKIE['role_user'];
      $_SESSION['id']=$_COOKIE['id'];
    }


    
?>