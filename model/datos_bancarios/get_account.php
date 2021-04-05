<?php
    session_start();

    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        //$user = $_POST['user'];
        if($_SESSION['type'] == 1){
            $user = $_SESSION['id_user'];
        }else{
            $user = $_POST['data'];
        }
        

        $get_account ="SELECT b.name AS bank, a.ID_bank AS ID_bank, a.CBU AS CBU, a.Alias AS Alias, t.name AS type_account_name, a.ID_type_account AS ID_type_account, t.currency as currency,
        a.check_account AS check_account, a.account_number AS account_number
        FROM account a
        INNER JOIN bank b ON b.ID_bank = a.ID_bank
        INNER JOIN type_account t ON t.ID_type_account = a.ID_type_account 
        WHERE a.ID_user = $user";
        $ejecucion =mysqli_query($conexion, $get_account);
        

        while($result=mysqli_fetch_array($ejecucion)){
                $json[]= array('bank' => $result['bank'], 'id_bank' => $result['ID_bank'], 'CBU' => $result['CBU'], 'alias' => $result['Alias'], 'type_account_name' => $result['type_account_name'],
                'id_type_account' => $result['ID_type_account'], 'currency' => $result['currency'],'check_account' => $result['check_account'], 'account_number' => $result['account_number'] );
        }

            $jsonstring= json_encode($json);
            echo $jsonstring;
            mysqli_close($conexion);
        

    }   
?>