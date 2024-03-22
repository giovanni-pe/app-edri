<?php
include("../../config.php");
$id_rol = $_POST["id_rol"];
$rol = $_POST["rol"];
$sentencia = $pdo->prepare("update tb_roles set rol=:rol,fyh_actualizacion=:fyh_actualizacion
        where id_rol = :id_rol");
$sentencia->bindParam("rol", $rol);
$sentencia->bindParam("fyh_actualizacion", $fechaHora);
$sentencia->bindParam("id_rol", $id_rol);



if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = 'Actualización exitosa';
        $_SESSION['icono'] = 'success';
        header('location:' . $URL . '/roles/');
}else {
        session_start();
        $_SESSION['mensaje'] = 'Error no se pudo actualizar el rol';
        $_SESSION['icono'] = 'error';
        header('location:' . $URL . '/roles/update.php?id='.$id_rol);
}
