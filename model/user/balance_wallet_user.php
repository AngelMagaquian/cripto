<?php
    session_start();
    
    if(isset($_SESSION['id_user'])){
        include("../system/conexion.php");
            $user = $_SESSION['id_user'];
            $balance="SELECT * FROM wallet_user WHERE ID_user = $user";
            $ejecucion=mysqli_query($conexion, $balance);

            $json = array();
            while($resultado= mysqli_fetch_array($ejecucion)){
                $json = array('ID_wallet_user' => $resultado['ID_wallet_user'], 'ID_user' => $resultado['ID_user'], 'balance' => $resultado['balance'],'OS_balance' => $resultado['OS_balance']);
            }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        mysqli_close($conexion);
    }
?>