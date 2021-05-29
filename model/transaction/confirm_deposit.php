<?php
    session_start();

    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        $id_deposit = $_POST['id_deposit'];
        $conf = intval($_POST['conf']);
        
 
        $consulta="SELECT pesos, id_wallet_user FROM deposit WHERE id_deposit = $id_deposit";
        $ejecucion = mysqli_query($conexion,$consulta);
        $repuesta = mysqli_fetch_array($ejecucion);

        $id_wallet_user = $repuesta['id_wallet_user'];
        $monto = $repuesta['pesos'];
        
        

        if($confirmation = $conexion -> query("UPDATE deposit SET state = $conf WHERE id_deposit = $id_deposit") or die("Error ". mysqli_error($conexion))){
            if($conf = 1){
                $confirmation = $conexion -> query("UPDATE wallet_user SET OS_balance = (OS_balance - $monto), balance = (balance + $monto)  WHERE ID_wallet_user = $id_wallet_user") or die("Error ". mysqli_error($conexion));
            }
            echo 1;
        }
        mysqli_close($conexion);
        

    }   
?>