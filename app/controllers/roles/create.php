<?php
include ("../../config.php");
$rol=$_POST["rol"];
$sentencia=$pdo->prepare("insert into tb_roles(rol,fyh_creacion) values (:rol,:fyh_creacion)");
$sentencia->bindParam("rol",$rol);
$sentencia->bindParam("fyh_creacion",$fechaHora);

if ($sentencia->execute()) {
session_start();
$_SESSION['mensaje']='Registro exitoso';
$_SESSION['icono']='success';
header('location:'.$URL.'/roles/');
}else{
    session_start();
$_SESSION['mensaje']='Error no se puedo registrar en la base de datos';
$_SESSION['icono']='error';
header('location:'.$URL.'/roles/create.php');
}



