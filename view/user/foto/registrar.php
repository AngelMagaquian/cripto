
<?php  
session_start();
include '../../../model/system/conexion.php';
include 'subir_imagen.php';

$id_user = $_SESSION['id_user'];

//$conf = new Configuracion();
//$conf->conectarBD();

$insertar = "INSERT INTO photo_user (id_user) VALUES ($id_user)";
$ejecucion = mysqli_query($conexion, $insertar);
//$conf->actualizacion($insertar);

echo $id_user;
insertaImagen($id_user,"photo_face");

//$conf->desconectarDB();

header("Location: ../datosPersonales.php");



?>