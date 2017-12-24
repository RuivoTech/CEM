<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Inicio - Controle de Membros CEM</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="seleciona.js"></script>
    </head>
    <body>
        <?php
        $login_cookie = $_COOKIE['login'];
        if (isset($login_cookie)) {
        include("menu.php");
        ?>
        
        
        
        <?php
        }else{
            echo "Você não fez login!!!";
            echo "<meta http-equiv='refresh' content='3;url=./'>";
        }
        ?>
    </body>
</html>
