<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        
        $user = $_SESSION['id_user'];
        $information="SELECT * FROM user WHERE ID_user = $user";
        $ejecucion=mysqli_query($conexion, $information);
    

        $json = array();
        while($response=mysqli_fetch_array($ejecucion)){
            $json= array('ID_user' => $response['ID_user'], 'DNI' => $response['DNI'], 'CUIL' => $response['CUIL'], 'name_user' => $response['name_user'], 
            'middle_name' => $response['middle_name'], 'last_name' => $response['last_name'], 'second_last_name' => $response['second_last_name'], 'birth_day' => $response['birth_day'],
            'email' => $response['email'], 'check_user' => $response['check_user'], 'check_email' => $response['check_email'],
            'pep' => $response['no_pep'], 'phone' => $response['phone']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        mysqli_close($conexion);
    }
    
    
?>