

$(document).ready(function () {
    Relatorio();
    function Relatorio() {
        var sexo = $("#sexo").val();
        var faixa = $("#faixa").val();
        $.ajax({
            type: 'POST',
            data: 'sexo=' + sexo + '&faixa=' + faixa + '&tabela=membros&function=4',
            //Definimos o tipo de retorno
            url: 'seleciona.php', //Definindo o arquivo onde serão buscados os dados
            success: function (dados) {
                $("#table").html(dados);
            }
        });
    }
    $("#sexo").change(function () {
        Relatorio();
    });
    $("#faixa").change(function(){
        Relatorio();
    })
});