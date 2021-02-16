<?php
    include("../system/conexion.php");
    $dni = $_POST['dni'];
    $cuil = $_POST['cuil'];
    $pass = $_POST['pass'];
    $name_user = $_POST['name_user'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $second_last_name = $_POST['second_last_name'];
    $birth_day = $_POST['birth_day'];
    $check_user = 0;
    $type = 0;

    if($middle_name == ''){
        $middle_name = null;
    }
    if($second_last_name == ''){
        $second_last_name = null;
    }

    try{
        $consulta="INSERT INTO user (DNI, CUIL, pass, name_user, middle_name, last_name, second_last_name, birth_day, check_user, type) 
        VALUE ($dni, $cuil, '$name_user', '$last_name', '$second_last_name', '$birth_day', $check_user, $type)";
        echo 1;
    }catch(Exception $e){
        echo 0;
    }
   

    $ejecucion = mysqli_query($conexion, $consulta);
?>