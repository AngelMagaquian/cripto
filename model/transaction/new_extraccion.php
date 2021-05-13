<?php
    session_start();
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");

        $CBU = $_POST['CBU'];
        $importe = $_POST['monto'];
        $id_user = $_SESSION['id_user'];

        $date = date('Y-m-d H:i:s');


        $new_extraccion = $conexion -> query("INSERT INTO extracciones (ID_user, CBU, date, amount, status) VALUE
         ($id_user,'$CBU','$date',$importe, 0)") or die("Error ". mysqli_error($conexion));
        
        
        if($new_extraccion){
            $new_extraccion = $conexion -> query("UPDATE wallet_user SET balance =(balance - $importe) WHERE ID_user = $id_user") or die("Error ". mysqli_error($conexion));
            echo 1;
        }else{
            echo 'Error: '. mysqli_error($conexion);
        }
        mysqli_close($conexion);
    }
?>