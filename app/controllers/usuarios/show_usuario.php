<?php

$sql_usuarios= "SELECT id_usuario,nombres,email,rol from tb_usuarios as us inner join tb_roles as rol on us.id_rol=rol.id_rol where id_usuario = '$id_usuario'";
$query_usuarios=$pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);
foreach($usuarios_datos as $usuario_dato){
    $nombres=$usuario_dato["nombres"];
    $email=$usuario_dato["email"];
    $rol=$usuario_dato["rol"];
    $id_usuario=$usuario_dato["id_usuario"];
}