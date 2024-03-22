<?php  
include ("../../config.php");
$id_usuario=$_POST["id_usuario"];
$sentencia=$pdo->prepare("delete from tb_usuarios where id_usuario=:id_usuario");
$sentencia->bindParam(":id_usuario",$id_usuario); 

if ($sentencia->execute()){
    session_start();
    $_SESSION["mensaje"]="Registro elimidodo de manera satisfactoria";
    $_SESSION["icono"]="success";
    header("Location:".$URL."/usuarios/"); 
}else{
    $_SESSION["mensaje"]="Registro no se puedo eliminar el registro de la base de datos.";
    $_SESSION["icono"]="error";
    header("Location:".$URL."/usuarios/"); 
}