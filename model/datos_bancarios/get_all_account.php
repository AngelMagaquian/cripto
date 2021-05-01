<?php
    session_start();

    if(isset($_SESSION['id_user']) && $_SESSION['type'] == 2){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        
 
        
        

        $get_account ="SELECT b.name AS bank, a.ID_bank AS ID_bank, a.CBU AS CBU, a.Alias AS Alias, t.name AS type_account_name, a.ID_type_account AS ID_type_account, t.currency as currency,
        a.check_account AS check_account, a.account_number AS account_number, 
		  CONCAT(u.name_user, ' ', u.middle_name,' ',u.last_name,' ',u.second_last_name) AS name, a.ID_user AS ID_user, u.CUIL AS CUIL, u.dni AS DNI
        FROM account a
        INNER JOIN bank b ON b.ID_bank = a.ID_bank
        INNER JOIN type_account t ON t.ID_type_account = a.ID_type_account 
        INNER JOIN user u ON u.ID_user = a.ID_user
        WHERE a.check_account = 0";
        $ejecucion =mysqli_query($conexion, $get_account);
        $row=mysqli_num_rows($ejecucion);

        $json=array();
        
        if($row > 0){
            while($result=mysqli_fetch_array($ejecucion)){
                $json[]= array('bank' => $result['bank'], 'id_bank' => $result['ID_bank'], 'CBU' => $result['CBU'], 'alias' => $result['Alias'], 'type_account_name' => $result['type_account_name'],
                'id_type_account' => $result['ID_type_account'], 'currency' => $result['currency'],'check_account' => $result['check_account'], 'account_number' => $result['account_number'],
                'name' => $result['name'], 'ID_user' => $result['ID_user'], 'CUIL' => $result['CUIL'], 'DNI' => $result['DNI']);
            }

            $jsonstring= json_encode($json);
            echo $jsonstring;
        }else{
            echo 0;
        }
        
            mysqli_close($conexion);
        

    }   
?>