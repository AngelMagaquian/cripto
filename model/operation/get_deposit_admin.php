<?php
    include("../system/conexion.php");
    $user = $_POST['data'];
    $consulta="	SELECT d.id_deposit AS ID, d.id_bank, a.CBU AS CBU, d.id_user, d.date_hour AS date, d.pesos AS pesos, d.state AS state, b.name AS bank
	FROM deposit d
	INNER JOIN account a ON a.CBU = d.CBU
	INNER JOIN bank b ON b.id_bank = a.ID_bank
	WHERE d.id_user = $user";

    $ejecucion = mysqli_query($conexion, $consulta);
    $json = array();

        while($resultado= mysqli_fetch_array($ejecucion)){
           $json[]=array('id' => $resultado['ID'], 'CBU' => $resultado['CBU'], 'date' => $resultado['date'], 'pesos' => $resultado['pesos'], 'state' => $resultado['state'], 'bank' =>$resultado['bank']);
        }

        $jsonstring= json_encode($json);
        echo $jsonstring;
        mysqli_close($conexion);
?>