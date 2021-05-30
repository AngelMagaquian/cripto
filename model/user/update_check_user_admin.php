<?php
    session_start();
    
    if($_SESSION['type'] == 2){
        include("../system/conexion.php");
        $id = $_POST['data'];

        $update_user = $conexion -> query("UPDATE user set check_user= 1 WHERE ID_user = $id") or die("Error ". mysqli_error($conexion));

        if($update_user){
            echo 1;
        }
    
        mysqli_close($conexion);
    }
?>