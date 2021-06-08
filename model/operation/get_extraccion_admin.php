<?php
    include("../system/conexion.php");
    $user = $_POST['data'];
    $consulta="	SELECT e.ID_extraccion AS ID , e.ID_user AS ID_user, a.CBU AS CBU
    , b.name AS bank
    ,e.date AS date, e.amount AS pesos, e.status AS state
    FROM extracciones e
    INNER JOIN user u ON e.ID_user = u.ID_user
    INNER JOIN account a ON e.CBU = a.CBU
    INNER JOIN bank b ON b.ID_bank = a.ID_bank
	WHERE e.id_user = $user";

    $ejecucion = mysqli_query($conexion, $consulta);
    $json = array();

        while($resultado= mysqli_fetch_array($ejecucion)){
           $json[]=array('id' => $resultado['ID'], 'CBU' => $resultado['CBU'], 'date' => $resultado['date'], 'pesos' => $resultado['pesos'], 'state' => $resultado['state'], 'bank' =>$resultado['bank']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        mysqli_close($conexion);
?>