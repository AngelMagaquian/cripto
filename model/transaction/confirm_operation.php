<?php
    session_start();

    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        $id_trans = $_POST['id_trans'];
        $conf = intval($_POST['conf']);
        
 
        
        

        if($confirmation = $conexion -> query("UPDATE operation SET state = $conf WHERE ID_op = $id_trans") or die("Error ". mysqli_error($conexion))){
            echo 1;
        }
        mysqli_close($conexion);
        

    }   
?>