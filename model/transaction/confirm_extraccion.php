<?php
    session_start();

    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        $id_extraccion = $_POST['id_extraccion'];
        $conf = intval($_POST['conf']);

        
        $consulta = "SELECT ID_user, amount
        FROM extracciones
        WHERE ID_extraccion= $id_extraccion";

        $ejecucion =mysqli_query($conexion,$consulta);
        $response = mysqli_fetch_array($ejecucion);
        $id_user = $response['ID_user'];
        $monto = $response['amount'];

        
 

        if($confirmation = $conexion -> query("UPDATE extracciones SET status = $conf WHERE ID_extraccion = $id_extraccion") or die("Error ". mysqli_error($conexion))){
            if($conf == 2){
                $confirmation = $conexion -> query("UPDATE wallet_user SET balance = (balance + $monto) WHERE ID_user = $id_user") or die("Error ". mysqli_error($conexion));
            }
            echo 1;
        }
        mysqli_close($conexion);
        

    }   
?>