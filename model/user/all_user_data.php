<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        if($_SESSION['type'] == 2){
            include("../system/conexion.php");
            
        
           
            $information="SELECT u.ID_user as ID_user , u.dni as DNI, u.cuil as CUIL, u.name_user as name_user,
            u.middle_name as middle_name, u.last_name as last_name, u.second_last_name as second_last_name, wu.balance as balance , wu.OS_balance as OS_balance, u.email,
            u.check_user AS status
            FROM user u
            INNER JOIN wallet_user wu ON wu.ID_user = u.ID_user
            ORDER BY u.check_user ";
            $ejecucion=mysqli_query($conexion, $information);
        

            $json = array();
            while($response=mysqli_fetch_array($ejecucion)){
                $json[]= array('ID_user' => $response['ID_user'], 'DNI' => $response['DNI'], 'CUIL' => $response['CUIL'], 'name_user' => $response['name_user'], 
                'middle_name' => $response['middle_name'], 'last_name' => $response['last_name'], 'second_last_name' => $response['second_last_name'],
                'email' => $response['email'], 'balance' => $response['balance'], 'OS_balance' => $response['OS_balance'], 'status' => $response['status']);
            }

            $jsonstring= json_encode($json);
            echo $jsonstring;
            
        
            mysqli_close($conexion);
        }
        
    }
    
    
?>