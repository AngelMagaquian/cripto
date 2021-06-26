<?php
    include("../system/conexion.php");
    $dni = $_POST['dni'];


    /*$consulta = "SELECT ID_user FROM user WHERE DNI = $dni";
    $ejecucion = mysqli_query($conexion,$consulta);
    $repuesta =mysqli_fetch_array($consulta);
    $id_user = $repuesta['ID_user'];*/

    $insert_wallet_user = $conexion -> query("INSERT INTO wallet_user (ID_user, balance, OS_balance) VALUE ((SELECT ID_User FROM user WHERE DNI = $dni), 0,0)") or die('Error: '. mysqli_error($conexion));

    /*Una vez creado el usuario y su wallet, obtenemos los datos de id user y id wallet user para actualizar ese dato en la tabla de user */
    $consulta="SELECT u.ID_user as ID_user, w.ID_wallet_user as ID_wallet_user
    FROM user u
    INNER JOIN wallet_user w ON w.ID_user = u.ID_user
    WHERE u.DNI = '$dni'";
    $ejecucion=mysqli_query($conexion,$consulta);
    $repuesta = mysqli_fetch_array($ejecucion);

    $user = $repuesta['ID_user'];
    $ID_wallet_user = $repuesta['ID_wallet_user'];

    $update_id_wallet = $conexion -> query("UPDATE user SET ID_wallet_user = $ID_wallet_user WHERE ID_user = $user") or die('Error: '. mysqli_error($conexion));
    $insert_photo = $conexion -> query("INSERT INTO photo_user (id_user, photo_face, photo_dni,  photo_dorso) VALUE ($user, NULL, NULL, null)") or die('Error: '. mysqli_error($conexion));

        if($insert_wallet_user){
            echo 1;
        }else{
            echo 'Error: '. mysqli_error($conexion);
        }
   
    
   

   
?>