<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        
        $user = $_SESSION['id_user'];
        $information="SELECT w.id_wallet_cripto as id_wallet_cripto , w.id_cripto as id_cripto, c.cripto_name as cripto_name, w.id_user as id_user, w.wallet_name as wallet_name
        FROM wallet_cripto w
        INNER JOIN cripto c ON c.id_cripto = w.id_cripto
        WHERE w.ID_user = $user";
        $ejecucion=mysqli_query($conexion, $information);
    

        $json = array();
        while($response=mysqli_fetch_array($ejecucion)){
            $json[]= array('id_wallet_cripto' => $response['id_wallet_cripto'], 'id_cripto' => $response['id_cripto'], 'id_user' => $response['id_user'], 'wallet_name' => $response['wallet_name'], 'cripto_name' => $response['cripto_name']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        mysqli_close($conexion);
    }
    
    
?>