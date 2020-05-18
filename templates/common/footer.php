<!-- JavaScript Libraries -->
  <script src="src/lib/jquery/jquery.min.js"></script>
  <script src="src/lib/jquery/jquery-migrate.min.js"></script>
  <script src='src/lib/jquery/validation.js'></script>
  <script src='src/lib/jquery/validationAdditional.js'></script>

  <script src="src/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="src/lib/easing/easing.min.js"></script>
  <script src="src/lib/superfish/hoverIntent.js"></script>
  <script src="src/lib/superfish/superfish.min.js"></script>
  <script src="src/lib/wow/wow.min.js"></script>
  <script src="src/lib/venobox/venobox.min.js"></script>
  <script src="src/lib/owlcarousel/owl.carousel.min.js"></script>
  

  
  <!-- Template Main Javascript File -->
  <script src="src/js/main.js"></script> 
  

  <?php 
      require('src/js/js.php');
    
      if(file_exists('src/js/'.$currentPage.'.js')){
        echo "<script src='src/js/$currentPage.js'></script>";
      }

  ?>

</body>

</html>
