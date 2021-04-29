<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");

        $id_user = $_SESSION['id_user'];


        $consulta="SELECT check_email AS email, check_user AS user 
        FROM user 
        WHERE ID_user = $id_user";

        $ejecucion=mysqli_query($conexion, $consulta);
        $respuesta =mysqli_fetch_array($ejecucion);

        if($respuesta['email'] == 1 && $respuesta['user'] == 1){
            echo 1;
        }else{
            echo 0;
        }
        mysqli_close($conexion);
    }
?>