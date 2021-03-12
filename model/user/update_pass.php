<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        $pass = $_POST['data'];
        $pass = MD5($pass);
        $user = $_SESSION['id_user'];
       
        
        $update_pass = $conexion -> query("UPDATE user set pass= '$pass' WHERE ID_user = $user") or die("Error ". mysqli_error($conexion));

        if($update_pass){
            echo 1;
        }
    
        mysqli_close($conexion);
    }else{
        echo "Debe iniciar sesion para ingresar a esta pagina";
    }
?>