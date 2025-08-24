<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script src="js/sa.js"></script>
<script>
  function alerts(icon, tit, location) {
    Swal.fire({
      position: "center",
      icon: icon,
      title: tit,
      showConfirmButton: true,
      timer: 3000
    }).then(function () {
      window.location = location;
    });

  }
  function alert_normal(icon, tit) {
    Swal.fire({
      position: "center",
      icon: icon,
      title: tit,
      showConfirmButton: true,
      timer: 3000
    });

  }
</script>