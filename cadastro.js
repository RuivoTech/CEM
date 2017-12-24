$(document).ready(function () {
    lista();
    function pesquisa() {
        var pesq = $("input[name=pesquisar]").val();
        if (pesq === "") {
            search = "";
        } else {
            search = "&search=" + pesq;
        }
        var tabela = $("input[name=tabela]").val();
        $.ajax({
            type: 'POST',
            url: "seleciona.php",
            data: "Seleciona=true&tabela=" + tabela + search,
            cache: false,
            success: function (Dados) {
                $("#tabela").html(Dados);
            }
        });
    }
    function Espos() {
        var pesq1 = $("input[name=nomeespos]").val();
        if (pesq1 === "") {
            search1 = "";
        } else {
            search1 = "&nome=" + pesq1;
        }
        var tabela1 = $("input[name=tabela]").val();
        $.ajax({
            type: 'POST',
            url: "seleciona.php",
            data: "Espos=true&tabela=" + tabela1 + search1,
            cache: false,
            success: function (Dado) {
                $("#SelecionaNome").html(Dado);
            }
        });
    }
    $("#result").hide();
    $('#Cadastrar').click(function () {
        Cadastrar();
    });
    $("#Editar").click(function () {
        Editar();
    });
    $("#Deletar").click(function () {
        Deletar();
    });
    $("#Limpar").click(function () {
        Limpar();
    });
    $("#fechar").on("click", function () {
        $("#result").hide();
    });
    $("#pesquisar").keyup(function () {
        pesquisa();
    });
    $("#nomeespos").keyup(function(){
        Espos();
    });
    pesquisa();
});
function Cadastrar() {
    var nome = $("input[name=nome]").val();
    if (nome === "") {
        $("#result").show();
        $("#resultado").html("Por favor, informe o nome do membro a ser cadastrado.");
    } else {
        var formData = $('#Cad :input').serializeArray();
        formData.push({name: "funcao", value: "Cadastrar"});
        $.post(
                $('#Cad').attr('action'),
                formData,
                function (result) {
                    if (result === "success") {
                        $("#result").show();
                        $("#resultado").html("Membro Cadastrado com sucesso!!!");
                    } else {
                        $("#result").show();
                        $("#resultado").html("Erro ao cadastrar membro " + result);
                    }
                    //$('#result').html(result);
                    $('#Cad').each(function () {
                        this.reset();
                    });
                }
        );
        lista();
    }
}
function Editar() {
    var formData = $('#Cad').serializeArray();
    formData.push({name: "funcao", value: "Editar"}, {name: "id", value: $("input[name=id]").val()});
    //showValues();
    $.post(
            $('#Cad').attr('action'),
            formData,
            function (result) {
                if (result === "success") {
                    $("#result").show();
                    $("#resultado").html("Membro alterado com sucesso!!!");
                } else {
                    $("#result").show();
                    $("#resultado").html("Erro ao alterar membro: " + result);
                }
                //$('#result').html(result);
                $('#Cad').each(function () {
                    this.reset();
                });
            }
    );
    lista();
}
function Deletar() {
    var id = $("input[name=id]").val();
    var Dados = $('#Cad').serializeArray();
    Dados.push({name: "funcao", value: "Deletar"}, {name: "id", value: $("input[name=id]").val()}, {name: "tabela", value: "membros"});
    $.post(
            $('#Cad').attr('action'),
            Dados,
            function (result) {
                if (result === "success") {
                    $("#result").show();
                    $("#resultado").html("Membro excluido com sucesso!!!");
                } else {
                    $("#result").show();
                    $("#resultado").html("Erro ao excluir membro: " + result);
                }
                //$('#result').html(result);
                $('#Cad').each(function () {
                    this.reset();
                });
            }
    );
    lista();
}

function Limpar() {
    $('#Cad').each(function () {
        this.reset();
    });
}
function lista() {
    var Tabela = $("input[name=tabela]").val();
    $.ajax({
        type: 'POST',
        url: "seleciona.php",
        data: "Seleciona=true&tabela=" + Tabela,
        success: function (Dados) {
            $("#tabela").html(Dados);
        }
    });
}


function showValues() {
    var fields = $("#Cad :input").serializeArray();
    fields.push({name: "funcao", value: "Editar"}, {name: "id", value: $("input[name=id]").val()});
    $("#result").empty();
    jQuery.each(fields, function (i, field) {
        $("#result").append(field.name + " " + field.value + " ");
    });
}