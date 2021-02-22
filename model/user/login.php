<?php
    include("../system/conexion.php");
    
    $dni = $_POST['id'];
    $pass = MD5($_POST['pass']);

    echo $pass;
    

    $consulta = "SELECT * FROM user WHERE dni = '$dni' and pass = '$pass'";
    
    $ejecucion = mysqli_query($conexion, $consulta);
    $resultado=mysqli_fetch_array($ejecucion);

    if(isset($resultado['id_user'])){
        /*$json = array();
        $json = array('permiso' => $resultado['permiso'],'area' => $resultado['area']);
        $jsonString = json_encode($json);
        echo $jsonString;*/

        session_start();
        $_SESSION['id_user'] = $resultado['id_user'];
        $_SESSION['dni'] = $resultado['dni'] ;
        $_SESSION['name_user'] = $resultado['name_user'] ;
        $_SESSION['last_name'] = $resultado['last_name'];
        $_SESSION['check_user'] = $resultado['check_user'];
        $_SESSION['type'] = $resultado['type'];

        echo 1;
    }else{
        echo 0;
    }
    
    mysqli_close($conexion);
?>