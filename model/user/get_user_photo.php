<?php
    include("../system/conexion.php");
    $id = $_POST['data'];

    $photo = $conexion -> query("SELECT * FROM photo_user WHERE ID_user = $id") or die("Error ". mysqli_error($conexion));
    
    $json = array();
    while($resultado = mysqli_fetch_array($photo)){
        $json = array('photo_face' => $resultado['photo_face'], 'photo_dni' => $resultado['photo_dni'], 'photo_dorso' => $resultado['photo_dorso']);
    }

    $jsonstring= json_encode($json);
    echo $jsonstring;
    

    mysqli_close($conexion);
?>