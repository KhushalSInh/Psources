
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/magnific-popup-options.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/sa.js"></script>
    <script>
        function alert(icon,tit,location){
             Swal.fire({
                        position: "center",
                        icon: icon,
                        title: tit,
                        showConfirmButton: true,
                        timer: 3000
                        })  .then(function(){
                            window.location = location;
                        });

        }
        function alert_normal(icon,tit){
             Swal.fire({
                        position: "center",
                        icon: icon,
                        title: tit,
                        showConfirmButton: true,
                        timer: 3000
                        });

        }
    </script>