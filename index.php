<?php
/*
 * index.php
 * 
 * Copyright 2017 Richieri Negri <richieri.ruivo@ruivotech.com.br>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */
include("conecta.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR">

<head>
	<title>Sistema de Membros CEM</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.31" />
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    $login_cookie = $_COOKIE['login'];
            if(isset($login_cookie)){
        echo "<meta http-equiv='refresh' content='0;url=home.php'>";
    }else{
    ?>
    <div id="login">
        <form action="login.php" method="post" name="login">
            Usuário:<br />
            <input type="text" name="usuario" value="" /><br />
            Senha:<br />
            <input type="password" name="password" value="" /><br />
            <input type="submit" name="Entrar" value="Entrar" />
        </form>
    </div>
    <?php
    }
    ?>
</body>

</html>
