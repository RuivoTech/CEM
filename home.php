<!DOCTYPE html>
    <head>
        <title>Inicio - Controle de Membros CEM</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="seleciona.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                Mudar();
                function Mudar() {
                    var i = $("#mes").val();
                    $.ajax({
                        type: 'POST',
                        data: 'id=' + i + '&tabela=membros&function=3',
                        //Definimos o tipo de retorno
                        url: 'seleciona.php', //Definindo o arquivo onde serão buscados os dados
                        success: function (dados) {
                            $("#table").html(dados);
                        }
                    });
                }
                $("#mes").change(function(){
                    Mudar();
                });
            });
        </script>
    </head>
    <body>
        <?php
        $login_cookie = $_COOKIE['login'];
        if (isset($login_cookie)) {
            ?>
            <div id="menu">
                <?php
                include("menu.php");
                include("conecta.php");
                ?>
            </div>     
            <select name="mes" id="mes">
                <option value="">Todos</option>
                <option value="00">Sem data</option>
                <option value="01">Janeiro</option>
                <option value="02">Fevereiro</option>
                <option value="03">Março</option>
                <option value="04">Abril</option>
                <option value="05">Maio</option>
                <option value="06">Junho</option>
                <option value="07">Julho</option>
                <option value="08">Agosto</option>
                <option value="09">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select> 
            <div id="table">

            </div>
            <?php
        } else {
            echo "Voc&ecirc; n&atilde;o fez login!!!";
            echo "<meta http-equiv='refresh' content='3;url=./'>";
        }
        ?>
    </body>
</html>
