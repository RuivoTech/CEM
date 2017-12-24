<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    $login_cookie = $_COOKIE['login'];
    if (isset($login_cookie)) {
        ?>
        <head>
            <meta charset="UTF-8">
            <title>Relatórios - CEM</title>
            <link href="style.css" rel="stylesheet" type="text/css" />
            <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="seleciona.js"></script>
        <script type="text/javascript" src="relatorio.js"></script>
        </head>
        <body>
            <div id="menu">
                <?php
                include("menu.php");
                ?>
            </div>

            <select name="sexo" id="sexo">
                <option value="">Sexo</option>
                <option value="0">Homens</option>
                <option value="1">Mulheres</option>
            </select>
            <select name="idade" id="faixa">
                <option value="0">Faixa Etária</option>
                <option value="1">Bebê</option>
                <option value="2">Crianças</option>
                <option value="3">Adolescentes</option>
                <option value="4">Jovens</option>
                <option value="5">Adultos</option>
            </select>
            <div id="table">

            </div>
        </body>
        <?php
    } else {
        echo "Voc&ecirc; n&atilde;o fez login!!!";
        echo "<meta http-equiv='refresh' content='3;url=./'>";
    }
    ?>
</html>
