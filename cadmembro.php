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
    error_reporting(0);
    ini_set(“display_errors”, 0 );
      $login_cookie = $_COOKIE['login'];
        if(isset($login_cookie)){
    ?>
    <div id="menu">
    <?php
        include("menu.php");
        include("conecta.php");
    ?>
    </div>    
    <input type="text" name="pesquisar" value="" size="130" id="pesquisar" placeholder="Pesquisar por nome ou e-mail..." /> <input type="button" value="Buscar" id="buscar" />
    <div id="tabela">   
        <?php
        /*require("seleciona.php");
        echo montaSelect();*/
        ?>
    </div>
    
    <div id="cadastro">
    <input type="button" name="Deletar" id="Delet" value="Excluir Membros" onclick="javascript:Delete(dados);" />    
        <form action="cadastrar.php" method="get" name="cadMembros" id="Cad">
            <table border="0" align="center">
                <tr>
                    <td>
                        ID:
                        <input type="text" name="id" value="" disabled="disabled" size="5" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Nome:<br/>
                            <input type="text" name="nome" value="" size="45" />
                    </td>
                    <td colspan="3">
                        E-mail:<br />
                        <input type="email" name="email" value="" size="45" />
                    </td>
                    <td>
                        RG:<br />
                        <input type="text" id="rg" name="rg" value="" maxlength="11" placeholder="00.000.000-0" size="10" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefone:<br/>
                        <input type="text" name="tel1" id="tel1" maxlength="14" placeholder="(00) 0000-0000" size="11"/>
                    </td>
                    <td>
                        Celular:<br/>
                        <input type="text" name="tel2" id="tel2" maxlength="15" placeholder="(00) 00000-0000" size="12"/>
                    </td>
                    <td colspan="3">
                        Data Nascimento:<br/>
                        <input type="text" id="data" name="datanasc" maxlength="10" size="8" placeholder="00/00/0000"/>
                    </td>
                    <td>
                        Sexo:<br />
                        <select name="sexo">
                            <option value="null">Sexo</option>
                            <option value="0">Homem</option>
                            <option value="1">Mulher</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Endereço:<br/>
                        <input type="text" name="endereco" size="45"/>
                    </td>
                    <td>
                        Nº:<br/>
                        <input type="text" name="numero" size="4"/>
                    </td>
                    <td>
                        CEP:<br/>
                        <input type="text" name="cep" id="cep" maxlength="9" placeholder="00000-000" size="8"/>
                    </td>
                    <td>
                        Cidade:<br/>
                        <input type="text" name="cidade" size="18"/>
                    </td>
                    <td>
                        Estado:<br/>
                        <select name="estado">
                            <option value="--">Estado</option>
                            <option value="0">Acre</option>
                            <option value="1">Alagoas</option>
                            <option value="2">Amapá</option>
                            <option value="3">Amazonas</option>
                            <option value="4">Bahia</option>
                            <option value="5">Ceará</option>
                            <option value="6">Distrito Federal</option>
                            <option value="7">Espírito Santo</option>
                            <option value="8">Goiás</option>
                            <option value="9">Maranhão</option>
                            <option value="10">Mato Grosso</option> 
                            <option value="11">Mato Grosso do Sul</option>
                            <option value="12">Minas Gerais</option>
                            <option value="13">Pará</option>
                            <option value="14">Paraíba</option>
                            <option value="15">Paraná</option>
                            <option value="16">Pernambuco</option>
                            <option value="17">Piauí</option>
                            <option value="18">Rio de Janeiro</option>
                            <option value="19">Rio Grande do Norte</option>
                            <option value="20">Rio Grande do Sul</option>
                            <option value="21">Rondônia</option>
                            <option value="22">Roraima</option>
                            <option value="23">Santa Catarina</option>
                            <option value="24">São Paulo</option>
                            <option value="25">Sergipe</option>
                            <option value="26">Tocantins</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        É batizado? 
                        <select name="batizado">
                            <option value="0">Sim</option>
                            <option value="1">Não</option>
                        </select>
                    </td>
                    <td>
                        Data do Batismo:<br/>
                        <input type="text" id="data2" name="databatismo" maxlength="10" placeholder="00/00/0000" size="8"/>
                    </td>
                    <td colspan="4">
                        Igreja Batizado:<br/>
                        <input type="text" name="ibatismo" size="45"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Ultima Igreja:<br/>
                        <input type="text" name="ultigreja" size="45"/>
                    </td>
                    <td colspan="3">
                        Ultimo Pastor:<br/>
                        <input type="text" name="ultpastor" size="45"/>
                    </td>
                    <td>
                        Profissão:<br/>
                        <input type="text" name="profissao"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ministério:<br/>
                        <select name="ministerio">
                            <option value="0">Nenhum</option>
                            <option value="1">Aconselhamento</option>
                            <option value="2">Bom Samaritano</option>
                            <option value="3">Comunicação Multimeios</option>
                            <option value="4">Corpo Ministerial</option>
                            <option value="5">Diretoria</option>
                            <option value="6">Ministério Infantil/Crianças</option>
                            <option value="7">Adolecentes</option>
                            <option value="8">Dança</option>
                            <option value="9">Ministério dos Surdos</option>
                            <option value="10">Evangelismo</option>
                            <option value="11">Diaconal</option>
                            <option value="12">Homens de Negócios</option>
                            <option value="13">Jovens</option>
                            <option value="14">Literatura</option>
                            <option value="15">Louvor</option>
                            <option value="16">Ministério Feminino</option>
                            <option value="17">Ministério Masculino</option>
                            <option value="18">Culto de Oração</option>
                            <option value="19">Missões</option>
                            <option value="20">Social</option>
                            <option value="21">Técnico</option>
                        </select>
                    </td>
                    <td>
                        Estado Civil:<br/>
                        <select name="estcivil">
                            <option value="0">Solteiro(a)</option>
                            <option value="1">Casado(a)</option>
                            <option value="2">Divorciado(a)</option>
                            <option value="3">Viúvo(a)</option>
                            <option value="4">Separado(a)</option>
                        </select>
                    </td>
                    <td colspan="3">
                        Nome Esposo(a):<br/>
                        <input type="text" name="nomeespos" size="45"/>
                        <div id="SelecionaNome">Teste</div>
                    </td>
                </tr>
                <tr id="Botoes">
                    <td>
                        <input type="hidden" value="membros" name="tabela"/>
                        <input type="button" value="Cadastrar" name="Cadastrar" id="Cadastrar" />
                    </td>
                    <td>
                        <input type="button" value="Editar" name="Editar" id="Editar"/>
                    </td>
                    <td colspan="2">
                        <input type="button" value="Deletar" name="Deletar" id="Deletar" />
                    </td>
                    <td>
                        <input type="button" value="Limpar" id="Limpar" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div id="result">
        
        <input type="image" src="imagens/fechar.png" width="20px" height="20px" id="fechar" />
        <p id="resultado"></p>
    </div>
        <?php
            }else{
                echo "Voc&ecirc; n&atilde;o fez login!!!" ;
                echo "<meta http-equiv='refresh' content='3;url=./'>";
            }
        ?>
    </body>
</html>
