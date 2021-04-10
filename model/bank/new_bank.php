<?php
    session_start();
    
    if(isset($_SESSION['id_user']) and $_SESSION['type'] == 2){
        
        include("../system/conexion.php");
        $id_bank = $_POST['id_bank'];
        $bank_name = $_POST['name_bank'];


       
        if($insert_bank = $conexion -> query("INSERT INTO bank (id_bank, name) VALUE ('$id_bank', '$bank_name')") or die("Error ". mysqli_error($conexion))){
            echo null;
        }
        
        
    
        
            
    

        
        mysqli_close($conexion);
    }
    
    
?>