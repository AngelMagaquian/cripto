<?php
    include("../system/conexion.php");

    $consulta="SELECT * FROM admin_values";
    $ejecucion =mysqli_query($conexion, $consulta);

    $json=array();

    while($resultado=mysqli_fetch_array($ejecucion)){
        $json[]= array('ID_value' =>$resultado['ID_value'], 'description' => $resultado['description'], 'value' => $resultado['value']);
    }

    $jsonstring= json_encode($json);
    echo $jsonstring;
    mysqli_close($conexion);
?>