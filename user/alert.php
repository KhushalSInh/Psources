<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<script>
   if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
   }
</script>

    <script src="js/sa.js"></script>
<?php
             
             if(isset($_GET['error']))
             {
                ?>
                      <script>
                          Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "An Email is allredy exist",
                            });

                    
                      </script>
                <?php
             } 
                if($_SESSION['role_user']=='user'){ ?>
                    <script>

                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Login successfully",
                        showConfirmButton: true,
                        timer: 3000
                        })  .then(function(){
                            window.location = "index.php";
                        });

                        </script>

                <?php } ?>
                

</body>
</html>