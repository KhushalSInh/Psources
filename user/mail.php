<?php

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;


            if(isset($_POST['reset']))
            {
              require 'PHPMailer/Exception.php';
              require 'PHPMailer/PHPMailer.php';
              require 'PHPMailer/SMTP.php';
  
              //Create an instance; passing `true` enables exceptions
              $mail = new PHPMailer(true);
               
  
              try {
                  //Server settings
                  $mail->isSMTP();                                            //Send using SMTP
                  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                  $mail->Username   = 'psources778@gmail.com';                    //SMTP username
                  $mail->Password   = 'zpjugxzzvhyxovgg';                           //SMTP password
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                  // $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                  //Enable implicit TLS encryption
                  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                  $mail->setFrom("psources778@gmail.com", '');
                  $mail->addAddress("$em", ' ');     //Add a recipient
                
  
                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Your verification code :'.$otp;
                  $mail->Body    = " <body>
                  Please use the following code to verify that for
                  Reset Password:<br>
                  <br>OTP Valid for 1 minute only<br><br>
  
                your password reset code is :<br>
                <h2>$otp</h2>
                ";
  
                  $mail->send();
              } catch (Exception $e) {
              }
            }
  

          if(isset($_POST['send']))
          {
           
                          //Import PHPMailer classes into the global namespace
                //These must be at the top of your script, not inside a function


                //Load Composer's autoloader
                require 'PHPMailer/Exception.php';
                require 'PHPMailer/PHPMailer.php';
                require 'PHPMailer/SMTP.php';

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                  
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'psources778@gmail.com';                    //SMTP username
                    $mail->Password   = 'zpjugxzzvhyxovgg';                           //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    // $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                    //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom("$email", ' ');
                    $mail->addAddress("psources778@gmail.com", ' ');     //Add a recipient
                  

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'contect form';
                    $mail->Body    = "sender name - $name <br> sender $email <br> $msg";

                    $mail->send();
                    echo "<script> window.location.href = 'index.php';</script>";
                } catch (Exception $e) {
                    echo " <script>alert_normal('success', 'Fail to Send ',);</script> : {$mail->ErrorInfo}";
                }
          }
          // welcome

          if(isset($_POST['singup']))
          {
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
              
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'psources778@gmail.com';                    //SMTP username
                $mail->Password   = 'zpjugxzzvhyxovgg';                           //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom("psources778@gmail.com", '');
                $mail->addAddress("$em", ' ');     //Add a recipient
              

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Welcome';
                $mail->Body    = " <body>
                hello $name,
            <h1>Welcome to Psouces</h1> <br>
           Thank you for signing up with us. We're thrilled to have you as part of our community.
            At Psources, we are committed to providing you with valuable resources and tools that help you for programing and web devlopment
            <h3>thanks to join our community </h3>
            </body>  

         ";

                $mail->send();
            } catch (Exception $e) {
            }
          }


         

 ?>