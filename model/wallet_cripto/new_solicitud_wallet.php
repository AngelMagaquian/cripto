<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        
        $user = $_SESSION['id_user'];

        $id_cripto = $_POST['id_cripto'];

            
        


        $information = $conexion -> query("INSERT INTO pending_wallet_cripto (ID_user, ID_cripto) VALUE ($user, $id_cripto)") or die("Error ". mysqli_error($conexion));
        $ejecucion=mysqli_query($conexion, $information);

        if($information){
            echo 1;
        }else{
            echo 2;
        }
    
        mysqli_close($conexion);
    }
    
    
?>