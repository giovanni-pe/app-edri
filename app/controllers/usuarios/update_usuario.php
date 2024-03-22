<?php
$id_usuario_get=$_GET["id"];
$sql_usuarios= "SELECT us.id_usuario,us.nombres,us.email,rol.rol,rol.id_rol from tb_usuarios as us inner join tb_roles as rol  on us.id_rol=rol.id_rol where id_usuario = '$id_usuario_get'";
$query_usuarios=$pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios_datos as $usuario_dato){
    $nombres=$usuario_dato["nombres"];
    $email=$usuario_dato["email"];
    $rol=$usuario_dato["rol"];
    $id_rol=$usuario_dato["id_rol"];
}