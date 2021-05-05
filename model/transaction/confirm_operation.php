<?php
    session_start();

    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        $id_trans = $_POST['id_trans'];
        $conf = intval($_POST['conf']);
        
        $consulta = "SELECT o.ID_op AS id_op, o.ID_user AS id_user, o.type AS type, o.pesos_amount as pesos_amount, w.id_wallet_user as id_wallet_user
        FROM operation o
        INNER JOIN wallet_user w ON w.id_user = o.ID_user
        WHERE o.ID_op = $id_trans";

        $ejecucion =mysqli_query($conexion,$consulta);
        $response = mysqli_fetch_array($ejecucion);
        $op = $response['type'];
        $monto = $response['pesos_amount'];
        $id_wallet_user = $response['id_wallet_user'];
 

        if($confirmation = $conexion -> query("UPDATE operation SET state = $conf WHERE ID_op = $id_trans") or die("Error ". mysqli_error($conexion))){
            if($op == "VENTA"){
                $confirmation = $conexion -> query("UPDATE wallet_user SET balance = (balance + $monto), OS_balance =(OS_balance - $monto) WHERE id_wallet_user = $id_wallet_user") or die("Error ". mysqli_error($conexion));
            }
            echo 1;
        }
        mysqli_close($conexion);
        

    }   
?>