<?php
include ("../../config.php");
$nombres=$_POST["nombres"];
$email=$_POST["email"];
$id_rol=$_POST["id_rol"];
$password_user=$_POST["password_user"];
$password_repeat=$_POST["password_repeat"];
$dispositivo_codigo=$_POST["dispositivo_codigo"];

if($password_user==$password_repeat){   
$password_user=password_hash($password_user,PASSWORD_DEFAULT);
$sentencia=$pdo->prepare("insert into tb_usuarios(nombres,email,dispositivo_codigo,password_user,id_rol,fyh_creacion) values (:nombres,:email,:dispositivo_codigo,:password_user,:id_rol,:fyh_creacion)");
$sentencia->bindParam("nombres",$nombres);
$sentencia->bindParam("email",$email);
$sentencia->bindParam("dispositivo_codigo",$dispositivo_codigo);
$sentencia->bindParam("password_user",$password_user);
$sentencia->bindParam("fyh_creacion",$fechaHora);
$sentencia->bindParam("id_rol",$id_rol);
$sentencia->execute();
session_start();
$_SESSION['mensaje']='Registro exitoso';
$_SESSION['ch']='ok';
header('location:'.$URL.'/login/');
}else{
    echo "las contraseñas no son iguales";
    session_start();
    $_SESSION['mensaje']="Error las contraseñas no son iguales";
    header('location:'.$URL.'/cuenta/create.php');
}


