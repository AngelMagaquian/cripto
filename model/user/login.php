<?php
    include("../system/conexion.php");
    
    $user = $_POST['user'];
    
    $pass = MD5($_POST['pass']);

    
       
        



        $update_pass = $conexion -> query("SELECT * FROM user WHERE email='$user' and pass = '$pass'") or die("Error ". mysqli_error($conexion));
        $resultado = mysqli_fetch_array($update_pass);
     
    

       
        if($resultado==0){
            echo 0;
        }else{
            session_start();
            $_SESSION['id_user'] = $resultado['ID_user'];
            $_SESSION['dni'] = $resultado['DNI'] ;
            $_SESSION['name_user'] = $resultado['name_user'] ;
            $_SESSION['last_name'] = $resultado['last_name'];
            $_SESSION['check_user'] = $resultado['check_user'];
            $_SESSION['type'] = $resultado['type'];
            echo 1;
        }
    
    
    mysqli_close($conexion);
?>