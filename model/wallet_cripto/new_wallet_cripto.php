<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        
        $user = $_SESSION['id_user'];
        $id_cripto_wallet = $_POST['id_cripto_wallet'];
        $description = $_POST['description_cripto_alias'];
        $id_cripto = $_POST['id_cripto'];


        $information="INSERT INTO wallet_cripto (id_wallet_cripto, id_cripto, id_user, wallet_name) VALUE ('$id_cripto_wallet', $id_cripto, $user, '$description')";
        $ejecucion=mysqli_query($conexion, $information);
    

        
       echo 1;
        
    
        mysqli_close($conexion);
    }
    
    
?>