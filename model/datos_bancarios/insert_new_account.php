<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
        
        $user = $_SESSION['id_user'];
        $id_bank = $_POST['id_bank'];
        $id_type_account = $_POST['id_type_account'];
        $CBU = $_POST['CBU'];
        $num_acc = $_POST['num_acc'];
        $alias = $_POST['alias'];


        /*const postData= {
            id_bank : $('#select_bank').val(),
            id_type_account : $('#select_type_account').val(),
            CBU : $('#new_cbu').val(),
            num_acc : $('#new_num_acc').val(),
            alias : $('#alias').val()
        };*/
             
       if( $insert_account= $conexion -> query("INSERT INTO account (ID_user, ID_bank, CBU, alias, ID_type_account, check_account,account_number) 
        VALUE ($user, '$id_bank', '$CBU', '$alias', $id_type_account, 0, '$num_acc')") or die("Error ". mysqli_error($conexion))){
            echo 1;
        }
    

        mysqli_close($conexion);
    }
    
    
?>