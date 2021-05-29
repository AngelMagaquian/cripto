<?php
    session_start();

    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");

        if($_SESSION['type'] == 2){
            $consulta ="SELECT e.ID_extraccion AS ID_extraccion , e.ID_user AS ID_user, CONCAT(u.name_user, ' ',u.middle_name, ' ', u.last_name, ' ',u.second_last_name) AS user_name, a.CBU AS CBU
            , b.name AS bank_name
            ,e.date AS date, e.amount AS amount, e.status AS status
            FROM extracciones e
            INNER JOIN user u ON e.ID_user = u.ID_user
            INNER JOIN account a ON e.CBU = a.CBU
            INNER JOIN bank b ON b.ID_bank = a.ID_bank
            ";
            $ejecucion = mysqli_query($conexion, $consulta);
        }else{
            $id_user= $_SESSION['id_user'];
            $consulta ="SELECT e.ID_extraccion AS ID_extraccion , e.ID_user AS ID_user, CONCAT(u.name_user, ' ',u.middle_name, ' ', u.last_name, ' ',u.second_last_name) AS user_name, a.CBU AS CBU
            , b.name AS bank_name
            ,e.date AS date, e.amount AS amount, e.status AS status
            FROM extracciones e
            INNER JOIN user u ON e.ID_user = u.ID_user
            INNER JOIN account a ON e.CBU = a.CBU
            INNER JOIN bank b ON b.ID_bank = a.ID_bank
            WHERE e.ID_user = $id_user
            ";
            $ejecucion = mysqli_query($conexion, $consulta);
        }

  
        
        $json = array();

        while($resultado= mysqli_fetch_array($ejecucion)){
            $json[] = array('id_extraccion' => $resultado['ID_extraccion'], 'ID_user' => $resultado['ID_user'],'user_name' => $resultado['user_name'], 'CBU' => $resultado['CBU'],
             'bank_name' => $resultado['bank_name'], 'date' => $resultado['date'], 'amount' => $resultado['amount'], 'status' => $resultado['status']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        mysqli_close($conexion);
    }
?>