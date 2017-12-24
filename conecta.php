<?php

$host = "localhost";
$user = "richieri";
$password = "Beatricy1812@";
$db = "CEM";

$con = mysql_connect($host, $user, $password)or die("Erro ao conectar com banco de dados, ".mysql_error());
mysql_set_charset('utf8',$con);
$selectDB = mysql_select_db($db, $con)or die("erro ao selecionar banco de dados, ".mysql_error());


?>
