<?php include 'class/class.php';


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
      if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
            }
    </script>
        <?php include './component/js.php'; ?>

<!-- </body>
</html> -->

<?php
   // reset Password
   $user_obj =  new user();
  
   if(isset($_POST['reset']))
   {
                


           $em = $_POST['email'];

           $user_obj->select("users","email='$em'");
           $result=$user_obj->getresult();
    
           if(!empty($result[0]))
           {
               $_SESSION['id']= $result[0]['id'];
               $_SESSION['password']= "reset";
               $otp = rand(000000,999999);
               setcookie('otp',$otp,time() + (60), "/");
               
               include 'mail.php';
               ?>
               <script>
                alert("success", "OTP  Send Sucessfully", "fotp.php");
               </script>
               <?php
   
   
           }
           else{
               header("location:Forget_password.php?error=invalid Emial");
               
           }
   }
   // varify otp
   
   if(isset($_POST['varify']))
   {
   
   
    $Fill_otp = $_POST['otp'];
    $otp = $_COOKIE['otp'];
   
    if($Fill_otp == $otp)
    {
       header("location:changepass.php");
        
    }
    else{
           
       header("location:fotp.php?error=invalid OTP");
   
    }
   
    
   }
   // update password
   if(isset($_POST['change']))
   {
   
   
           $pas = $_POST['pass'];
           $rpas = $_POST['repass'];
           $id = $_SESSION['id'];
   
           if($pas == $rpas)
           {
                unset($_SESSION['password']);
   
                $iv=openssl_random_pseudo_bytes(16);
                $npas=$user_obj->str_openssl_enc($pas,$iv);
                $iv=bin2hex($iv);

                $user_obj->update("users",['password'=>$npas,'iv'=>$iv],"id='$id'");
               unset($_SESSION['id']);
               ?>
               <script>
                alert("success","Password  Change  Successfully","login.php");
               </script>
               <?php
           
               
           }
           else{
                   
               header("location:changepass.php?error=Password Does not Match");
   
           }
   
    
   }
?>