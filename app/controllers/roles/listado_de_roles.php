<?php
$sql_roles= "SELECT * from tb_roles";
$query_roles=$pdo->prepare($sql_roles);
$query_roles->execute();
$roles_datos=$query_roles->fetchAll(PDO::FETCH_ASSOC);
