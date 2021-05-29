<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");

        $id_user = $_SESSION['id_user'];
        $CBU = $_POST['data'];

        $consulta="SELECT check_account FROM account WHERE CBU = '$CBU' AND ID_user = $id_user";

        $ejecucion=mysqli_query($conexion, $consulta);
        $respuesta =mysqli_fetch_array($ejecucion);

        if($respuesta['check_account'] == 1){
            echo 1;
        }else{
            echo 0;
        }
        mysqli_close($conexion);
    }
?>