<?php
    include("../system/conexion.php");
    $dni = $_POST['dni'];


    /*$consulta = "SELECT ID_user FROM user WHERE DNI = $dni";
    $ejecucion = mysqli_query($conexion,$consulta);
    $repuesta =mysqli_fetch_array($consulta);
    $id_user = $repuesta['ID_user'];*/

    $insert_wallet_user = $conexion -> query("INSERT INTO wallet_user (ID_user, balance, OS_balance) VALUE ((SELECT ID_User FROM user WHERE DNI = $dni), 0,0)") or die('Error: '. mysqli_error($conexion));

        if($insert_wallet_user){
            echo 1;
        }else{
            echo 'Error: '. mysqli_error($conexion);
        }
   
    
   

   
?>