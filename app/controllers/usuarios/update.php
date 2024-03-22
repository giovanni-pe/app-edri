<?php
include("../../config.php");
$nombres = $_POST["nombres"];
$email = $_POST["email"];
$password_user = $_POST["password_user"];
$password_repeat = $_POST["password_repeat"];
$id_usuario = $_POST["id_usuario"];
$id_rol = $_POST["id_rol"];

if ($password_user == "") {
    if ($password_user == $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("update tb_usuarios set nombres=:nombres,email=:email,id_rol=:id_rol,fyh_actualizacion=:fyh_actualizacion
        where id_usuario = :id_usuario");
        $sentencia->bindParam("nombres", $nombres);
        $sentencia->bindParam("email", $email);
        $sentencia->bindParam("id_usuario", $id_usuario);
        $sentencia->bindParam("id_rol", $id_rol);
        $sentencia->bindParam("fyh_actualizacion", $fechaHora);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = 'Actualización exitosa';
        $_SESSION['icono'] = 'success';
        header('location:' . $URL . '/cuenta/');
    } else {
        echo "las contraseñas no son iguales";
        session_start();
        $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
        $_SESSION['icono'] = 'error';
        header('location:' . $URL . '/cuenta/update.php?id=' . $id_usuario);
    }
} else {
    if ($password_user == $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT);
        $sentencia = $pdo->prepare("update tb_usuarios set nombres=:nombres,email=:email,password_user=:password_user,id_rol=:id_rol,fyh_actualizacion=:fyh_actualizacion
        where id_usuario = :id_usuario");
        $sentencia->bindParam("nombres", $nombres);
        $sentencia->bindParam("email", $email);
        $sentencia->bindParam("password_user", $password_user);
        $sentencia->bindParam("id_usuario", $id_usuario);
        $sentencia->bindParam("id_rol", $id_rol);
        $sentencia->bindParam("fyh_actualizacion", $fechaHora);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = 'Actualización exitosa';
        $_SESSION['icono'] = 'success';
        header('location:' . $URL . '/cuenta/');
    } else {
        echo "las contraseñas no son iguales";
        session_start();
        $_SESSION['mensaje'] = "Error las contraseñas no son iguales";
        $_SESSION['icono'] = 'error';
        header('location:' . $URL . '/cuenta/update.php?id=' . $id_usuario);
    }
}
