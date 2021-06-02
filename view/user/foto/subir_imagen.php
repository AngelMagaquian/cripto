<?php 

function insertaImagen($id_user,$tipo_imagen){
	include '../../../model/system/conexion.php';
	echo "entro a la funcion 1";
	if(empty($_FILES[$tipo_imagen]["name"]))
	echo"<br>";
	echo "entro a la funcion 2";
	echo"<br>";
	echo $tipo_imagen;

	

	$file_name = $_FILES[$tipo_imagen]["name"];
	echo"<br>";
	echo "DUDA: ".$file_name;
	$extension = pathinfo($_FILES[$tipo_imagen]["name"],PATHINFO_EXTENSION);
	$ext_formatos = array('png','gif','jpg','jpeg','pdf');

	echo"<br>";
	echo "entro a la funcion 3";
	if(!in_array(strtolower($extension),$ext_formatos))
		return;
		echo"<br>";
		echo "entro a la funcion 4";
	if($_FILES[$tipo_imagen]["size"] > 33000003008000)
		return;



	$targetDir = "img/";

	@rmdir($targetDir);

	if (!file_exists($targetDir)){

		@mkdir($targetDir,077,true);
	}

	$token = md5(uniqid(rand(), true));
	$file_name = $token.'.'.$extension;

	$add = $targetDir.$file_name;
	$db_url_img = "$file_name";
	echo "antes de if";
	if(move_uploaded_file($_FILES[$tipo_imagen]["tmp_name"],$add)){
		$sql = "UPDATE photo_user SET $tipo_imagen = '$db_url_img' WHERE id_user = $id_user";
		$ejecucion = mysqli_query($conexion, $sql);


	}


}

 ?>