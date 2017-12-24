<!DOCTYPE html>

<head>
	<title>Sistema de Membros CEM</title>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.31" />
	<link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="cadastro.js"></script>
        <script type="text/javascript" src="seleciona.js"></script>
        <script type="text/javascript" src="mascara.js"></script>
</head>
    <body>
    <?php
      $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
    ?>
    <div id="menu">
    <?php
        include("menu.php");
        include("conecta.php");
    ?>
    </div>    
    
    <div id="tableUser">   
        <?php
            $mes = date("m");
            $query = mysql_query("SELECT * FROM usuario");
            $num = mysql_num_rows($query);
            if($num != "0"){
             echo '<table name="usuario" border="1" align="center">
        <tr>
            <th>Código</th>
            <th>Nome</th>
        </tr>';
            while ($row = mysql_fetch_array($query)){
                echo "<tr onMouseOver=\"javascript: this.className='trOver'\" onMouseOut=\"javascript: this.className='trOut'\" onClick=\"javascript:Selecionar();\">";
                echo "<td class='codigo'>".$row["id"]."</td>";
                echo "<td class='nome'>".$row["usuario"]."</td>";
                echo "</tr>";

            }
            echo "</table>";
            }
            ?>
    </div>
    <hr />
    <div id="cadastro">
        <form action="cadastrar.php" method="post" name="cadusuario">
            <table border="0" align="center">
                <tr>
                    <td colspan="2">
                        Usuario:<br>
                            <input type="text" name="usuario" value="" size="20" />
                    </td>
                    <td colspan="2">
                        Senha:<br />
                        <input type="password" name="password" value="" size="20" />
                    </td>
                    <td>
                        Confirme a Senha:<br />
                        <input type="password" name="con_password" value="" maxlength="20" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" value="usuario" name="tabela"/>
                        <input type="button" value="Cadastrar" id="Cadastrar" />
                    </td>
                    <td>
                        <input type="button" value="Editar" id="Editar"/>
                    </td>
                    <td>
                        <input type="button" value="Deletar" id="Deletar"/>
                    </td>
                    <td>
                        <input type="button" value="Limpar" id="Limpar"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
        <?php
            }else{
                echo "Voc&ecirc; n&atilde;o fez login!!!" ;
                echo "<meta http-equiv='refresh' content='3;url=./'>";
            }
        ?>
    </body>
</html>