<?php
    include("../system/conexion.php");
    session_start();
    $user = $_SESSION['id_user'];
    $pass = MD5($_POST['data']);

    
    $select_pass = $conexion -> query("SELECT * FROM user WHERE ID_user=$user and pass = '$pass'") or die("Error ". mysqli_error($conexion));
    $resultado = mysqli_fetch_array($select_pass);

    
     
    

       
        if($resultado==0){
          echo 0 ;
        }else{
          echo 1;
        }
    
    
    mysqli_close($conexion);
?>