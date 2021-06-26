<?php
    session_start();
    
    if($_SESSION['id_user'] == 1 and $_SESSION['type'] == 2){
        include("../system/conexion.php");
        $id = $_POST['data'];

       
        $information = "SELECT u.ID_user as ID_user , u.dni as DNI, u.cuil as CUIL, CONCAT(u.name_user, ' ',u.middle_name,' ',u.last_name,' ',u.second_last_name) as name_user,
        wu.balance as balance , wu.OS_balance as OS_balance, u.email, u.check_user AS check_user, u.check_email AS check_email, u.birth_day AS birth_day, u.no_pep AS pep
        FROM user u
        INNER JOIN wallet_user wu ON wu.ID_user = u.ID_user
        WHERE u.ID_user = $id";
        $ejecucion=mysqli_query($conexion, $information);
    

        $json = array();

        while($response=mysqli_fetch_array($ejecucion)){
            $json= array('ID_user' => $response['ID_user'], 'DNI' => $response['DNI'], 'CUIL' => $response['CUIL'], 'name_user' => $response['name_user'], 
            'birth_day' => $response['birth_day'], 'balance' => $response['balance'], 'OS_balance' => $response['OS_balance'],
            'email' => $response['email'], 'check_user' => $response['check_user'], 'check_email' => $response['check_email'], 'pep' => $response['pep']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        
    
        mysqli_close($conexion);
    }else{
        echo "No esta autorizado para este sitio";
    }
?>