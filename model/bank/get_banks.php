<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        

       
        $information = "SELECT * FROM bank";
        $ejecucion=mysqli_query($conexion, $information);
        
        $json = array();

        while($response=mysqli_fetch_array($ejecucion)){
            $bank_name = utf8_encode($response['name']);
            $json[]= array('id_bank' => $response['id_bank'], 'name' => $bank_name);
        }
        
        
        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        mysqli_close($conexion);
    }else{
        echo "No esta autorizado para este sitio";
    }
?>