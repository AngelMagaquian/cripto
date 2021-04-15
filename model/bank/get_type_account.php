<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        

       
        $information = "SELECT * FROM type_account";
        $ejecucion=mysqli_query($conexion, $information);
        
        $json = array();

        while($response=mysqli_fetch_array($ejecucion)){
            
            $json[]= array('id_type_account' => $response['ID_type_account'], 'name' => $response['name'], 'currency' => $response['currency']);
        }
        
        
        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        mysqli_close($conexion);
    }else{
        echo "No esta autorizado para este sitio";
    }
?>