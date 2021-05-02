<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        if($_SESSION['type'] == 2){
            $user = $_POST['id_user'];
            $id_cripto_wallet = $_POST['id_cripto_wallet'];
            $description = $_POST['description_cripto_alias'];
            $id_cripto = $_POST['id_cripto'];
            $id_pending = $_POST['id_pending'];
        }else{
            $user = $_SESSION['id_user'];
            $id_cripto_wallet = $_POST['id_cripto_wallet'];
            $description = $_POST['description_cripto_alias'];
            $id_cripto = $_POST['id_cripto'];
        }       
        


        $information = $conexion -> query("INSERT INTO wallet_cripto (id_wallet_cripto, id_cripto, id_user, wallet_name) VALUE ('$id_cripto_wallet', $id_cripto, $user, '$description')") or die("Error ". mysqli_error($conexion));
        $ejecucion=mysqli_query($conexion, $information);

        if($information){
            echo 1;
            if($_SESSION['type'] == 2){
                $information = $conexion -> query("DELETE FROM pending_wallet_cripto WHERE ID_pending = $id_pending") or die("Error ". mysqli_error($conexion));
                $ejecucion=mysqli_query($conexion, $information);
            }
           
        }else{
            echo 2;
        }
    
        mysqli_close($conexion);
    }
    
    
?>