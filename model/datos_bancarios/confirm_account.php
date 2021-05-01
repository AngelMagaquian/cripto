<?php
    session_start();

    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        $CBU = $_POST['CBU'];
        $conf = intval($_POST['conf']);
        
 
        
        

        if($confirmation = $conexion -> query("UPDATE account SET check_account = $conf WHERE CBU = '$CBU'") or die("Error ". mysqli_error($conexion))){
            echo 1;
        }
        mysqli_close($conexion);
        

    }   
?>