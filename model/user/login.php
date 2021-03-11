<?php
    include("../system/conexion.php");
    
    $user = $_POST['user'];
    
    $pass = MD5($_POST['pass']);

    
        $consulta = "SELECT * FROM user WHERE email='$user' and pass = '$pass'";
        $ejecucion = mysqli_query($conexion, $consulta);
        $resultado=mysqli_fetch_array($ejecucion);
    
    
    if($resultado == 0){
        echo 0;
    }else{
        /* $json = array();
        $json = array('ID_user' => $resultado['ID_user'],'name_user' => $resultado['name_user']);
        $jsonString = json_encode($json);
        echo $jsonString;*/
        
        session_start();
        $_SESSION['id_user'] = $resultado['ID_user'];
        $_SESSION['dni'] = $resultado['DNI'] ;
        $_SESSION['name_user'] = $resultado['name_user'] ;
        $_SESSION['last_name'] = $resultado['last_name'];
        $_SESSION['check_user'] = $resultado['check_user'];
        $_SESSION['type'] = $resultado['type'];
        echo $_SESSION['id_user'];
    }
    
    mysqli_close($conexion);
?>