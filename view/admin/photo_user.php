<?php 
  session_start();
  if(isset($_SESSION['id_user'])){
    if($_SESSION['id_user'] == 1 and $_SESSION['type'] == 2){
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <?php
  include 'head.php';
  ?>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg border-bottom" style="min-height: 55px;">
        
      </nav>

      <!--VISTA-->
      <section id="cuentas">
        <div class="container-fluid">
            <div class="row justify-content-center" style="    min-height: calc(100vh - 55px)">
                <div class="col-lg-11 col-12 mt-4" style="min-heig">
                    <div class="card mb-2">
                            <div class="card-body">
                              <div class="col-6"></div>  
                              <div class="col-6"></div>  
                              <div class="col-6"></div>  
                            </div>
                        </div>
                </div>           
            </div>        
        </div>
      </section>
      <!--FIN DE VISTA-->

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php
  include 'script.php';
  ?>

</body>

</html>
<?php
  }
}
echo "No posee permisos para este sitio";
  ?>


