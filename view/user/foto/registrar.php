
<?php  
session_start();
include '../../../model/system/conexion.php';
include 'subir_imagen.php';

$id_user = $_SESSION['id_user'];
$column = "";
$column = $_POST["table"];
echo $column;
//$conf = new Configuracion();
//$conf->conectarBD();

$insertar = "INSERT INTO photo_user (id_user) VALUE ($id_user)";
$ejecucion = mysqli_query($conexion, $insertar);
//$conf->actualizacion($insertar);


insertaImagen($id_user,$column);

//$conf->desconectarDB();

header("Location: ../datosPersonales.php");



?>