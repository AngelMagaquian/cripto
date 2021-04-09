<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        $user = $_SESSION['id_user'];
        $date_from = $_POST['date_from'];
        $date_to =$_POST['date_to'];


        if($date_from <= $date_to){
            $information="SELECT o.ID_op AS id_operation, o.ID_user AS id_user, o.ID_cripto AS id_cripto, o.ID_wallet_cripto AS id_wallet_cripto, o.type AS type, o.cripto_amount AS cripto_amount, o.pesos_amount AS pesos_amount, o.date_hour AS date_hour, o.state AS state, 
            w.wallet_name AS wallet_name, c.cripto_name AS cripto_name
            FROM operation o
            INNER JOIN wallet_cripto w ON w.id_wallet_cripto = o.ID_wallet_cripto
            INNER JOIN cripto c ON c.ID_cripto = o.ID_cripto
            WHERE o.ID_user = $user and 
            o.date_hour between '$date_from' and '$date_to'
            ";
            $ejecucion=mysqli_query($conexion, $information);

            $json = array();
            while($resultado= mysqli_fetch_array($ejecucion)){
                $json[] = array('id_operation' => $resultado['id_operation'], 'ID_user' => $resultado['id_user'], 
                'id_cripto' => $resultado['id_cripto'], 'id_wallet_cripto' => $resultado['id_wallet_cripto'], 'type' => $resultado['type'],
                'cripto_amount' => $resultado['cripto_amount'], 'pesos_amount' => $resultado['pesos_amount'], 'date_hour' => $resultado['date_hour'], 'state' => $resultado['state'],
                'wallet_name' => $resultado['wallet_name'], 'cripto_name' => $resultado['cripto_name']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        }else{
            echo 0;
        }
            
    

        
        mysqli_close($conexion);
    }
    
    
?>