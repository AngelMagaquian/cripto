<?php
    session_start();
    
    if($_SESSION['type'] == 2){
        include("../system/conexion.php");
        $dni = $_POST['dni'];

        $update_user = $conexion -> query("UPDATE user set check_user= 1 WHERE DNI = $dni") or die("Error ". mysqli_error($conexion));

        if($update_user){
            echo 1;
        }
    
        mysqli_close($conexion);
    }
?>