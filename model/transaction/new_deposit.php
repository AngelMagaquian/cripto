<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");

        $CBU= $_POST['CBU'];
        $importe = $_POST['importe'];
        $id_user = $_SESSION['id_user'];


        $consulta="SELECT b.id_bank as ID_bank, u.ID_wallet_user as ID_wallet_user, a.CBU , u.ID_user
        FROM account a
        INNER JOIN user u ON a.ID_user = u.ID_user
        INNER JOIN bank b ON b.id_bank = a.ID_bank
        WHERE a.CBU = '$CBU'";

        $ejecucion=mysqli_query($conexion, $consulta);
        $respuesta =mysqli_fetch_array($ejecucion);

        $id_bank = $respuesta['ID_bank'];
        $ID_wallet_user = $respuesta['ID_wallet_user'];
        $date = date('Y-m-d H:i:s');


        $new_deposit = $conexion -> query("INSERT INTO deposit (id_bank, CBU, id_user, id_wallet_user, date_hour, pesos, state) VALUE
         ('$id_bank', '$CBU', $id_user, $ID_wallet_user,'$date',$importe, 0)") or die("Error ". mysqli_error($conexion));
        
        
        if($new_deposit){
            $new_deposit = $conexion -> query("UPDATE wallet_user SET OS_balance =(OS_balance + $importe) WHERE ID_user = $id_user") or die("Error ". mysqli_error($conexion));
            echo 1;
        }else{
            echo 'Error: '. mysqli_error($conexion);
        }
        mysqli_close($conexion);
    }
?>