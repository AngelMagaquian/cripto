<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        $pass = $_POST['pass'];
        $pass = MD5($pass);
        
        $user = $_SESSION['id_user'];
        $update_pass="UPDATE user set pass= '$pass' WHERE ID_user = $user";
        $ejecucion=mysqli_query($conexion, $update_pass);
        echo 1;
        
    
        mysqli_close($conexion);
    }
?>