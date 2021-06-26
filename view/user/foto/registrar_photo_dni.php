<?php  
session_start();
$user = $_SESSION['id_user'];
include '../../../model/system/conexion.php';

print_r($_FILES);
//Necesitamos 2, el [name] y [tmp_name]

$nombre = $_FILES['photo_dni']['name'];

$guardado = $_FILES['photo_dni']['tmp_name'];

//este es if es para saber si existe la carpeta de destino <3
if(!file_exists('img')){
    mkdir('img',0777,true);
    //ya creada pregunta si existe y se guarda
    if(file_exists('img')){
        if(move_uploaded_file($guardado, 'img/'.$user.$nombre)){
            echo "guardado";

            $consulta = "UPDATE photo_user set photo_dni = '$nombre'
            WHERE ID_user= $user";

            $ejecucion =mysqli_query($conexion, $consulta);
        }else{
            echo "archivo no guardado";
        }
    }
}else{
    if(move_uploaded_file($guardado, 'img/'.$user.$nombre)){
        echo "guardado";

        $consulta = "UPDATE photo_user set photo_dni = CONCAT('img/' , '$user' ,'$nombre')
        WHERE ID_user= $user";

        $ejecucion =mysqli_query($conexion, $consulta);

        var_dump($ejecucion);
        header("Location: ../datosPersonales.php");
    }else{
        echo "archivo no guardado";
    }
}






?>