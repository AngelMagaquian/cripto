<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");

        $information="SELECT * FROM cripto";
        $ejecucion=mysqli_query($conexion, $information);
    

        $json = array();
        while($response=mysqli_fetch_array($ejecucion)){
            $json[]= array('ID_cripto' => $response['ID_cripto'], 'name' => $response['cripto_name'], 'description' => $response['description']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        mysqli_close($conexion);
    }
    
    
?>