<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");

        $id_user = $_SESSION['id_user'];


        $consulta="SELECT check_email AS email, check_user AS user 
        FROM user 
        WHERE ID_user = $id_user";

        $ejecucion=mysqli_query($conexion, $consulta);
     

        $json = array();
        while($resultado= mysqli_fetch_array($ejecucion)){
            $json = array('email' => $resultado['email'], 'user' => $resultado['user']);
        }
        $jsonstring= json_encode($json);
        echo $jsonstring;

        /* if($respuesta['email'] == 1 && $respuesta['user'] == 1){
            echo 1;
        }else{
            echo 0;
        } */
        mysqli_close($conexion);
    }
?>