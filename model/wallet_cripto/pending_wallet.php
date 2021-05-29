<?php
    session_start();
    
    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");

 
        $information="SELECT p.ID_pending AS ID_pending, p.ID_user AS ID_user, p.ID_cripto AS ID_cripto, 
        CONCAT(u.name_user, ' ',u.middle_name, ' ', u.last_name, ' ', u.second_last_name) AS name,
        CONCAT(c.cripto_name ,' (',c.description,')') AS cripto_name
        FROM pending_wallet_cripto p
        INNER JOIN user u ON p.ID_user = u.ID_user
        INNER JOIN cripto c ON p.ID_cripto = c.ID_cripto";

        $ejecucion=mysqli_query($conexion, $information);
    

        $json = array();
        while($response=mysqli_fetch_array($ejecucion)){
            $json[]= array('ID_pending' => $response['ID_pending'], 'ID_user' => $response['ID_user'], 'ID_cripto' => $response['ID_cripto'],
            'user_name' => $response['name'], 'cripto_name' => $response['cripto_name']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        mysqli_close($conexion);
    }
    
    
?>