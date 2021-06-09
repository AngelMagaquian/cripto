<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        $value = $_POST['data'];
        $id_value = $_POST['id_value'];


        

        $consulta = "UPDATE admin_values SET VALUE = $value  WHERE ID_value= $id_value";
        $ejecucion = mysqli_query($conexion, $consulta);
        echo $id_value;
        mysqli_close($conexion);
    }else{
        echo "No esta autorizado para este sitio";
    }
?>