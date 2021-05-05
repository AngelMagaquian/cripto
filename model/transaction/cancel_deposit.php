<?php
    session_start();

    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        $id_deposit = $_POST['id_trans'];
        $description = $_POST['description'];
        
 
        $consulta="SELECT d.id_deposit AS id_description, d.id_bank AS id_bank, b.name AS bank_name, d.CBU AS CBU, d.id_user AS id_user, d.id_wallet_user AS id_wallet_user,
        d.date_hour AS DATE, d.pesos AS monto, d.state AS state
        FROM deposit d 
        INNER JOIN bank b ON  d.id_bank = b.id_bank 
        WHERE id_deposit = $id_deposit";
        $ejecucion = mysqli_query($conexion,$consulta);
        $respuesta = mysqli_fetch_array($ejecucion);

        $CBU = $respuesta['CBU'];
        $bank_name = $respuesta['bank_name'];
        $id_bank = $respuesta['id_bank'];
        $id_wallet_user = $respuesta['id_wallet_user'];
        $monto = $respuesta['monto'];
        
        

        if($confirmation = $conexion -> query("INSERT INTO cancel_deposit (id_deposit, CBU, id_wallet_user, pesos, description) VALUE ($id_deposit,'$CBU',$id_wallet_user,$monto,'$description')") or die("Error ". mysqli_error($conexion))){
            echo 1;
        }
        mysqli_close($conexion);
        

    }   
?>