<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        
        $user = $_SESSION['id_user'];
        $cripto =$_POST['data'];
        

        $query_wallet="SELECT w.id_wallet_cripto AS id_wallet_cripto, w.id_cripto, w.id_user AS id_user, w.wallet_name AS wallet_name, c.cripto_name, c.ID_cripto
                    FROM wallet_cripto w
                    INNER JOIN cripto c ON w.id_cripto = c.ID_cripto
                    WHERE c.cripto_name = '$cripto'
                    AND w.id_user = $user";

            $ejecucion=mysqli_query($conexion, $query_wallet);
            $row=mysqli_num_rows($ejecucion);
        if($row > 0){
            $json = array();
            while($response=mysqli_fetch_array($ejecucion)){
                $json[]= array('id_wallet_cripto' => $response['id_wallet_cripto'], 'id_cripto' => $response['id_cripto'], 'id_user' => $response['id_user'], 'wallet_name' => $response['wallet_name'], 'cripto_name' => $response['cripto_name']);
            }

            $jsonstring= json_encode($json);
            echo $jsonstring;
        }else{
            echo 0;
        }
            
        
 
    
        mysqli_close($conexion);
    }
    
    
?>