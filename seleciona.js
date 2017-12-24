function Seleciona(id) {
    var tabela = $("input[name=tabela]").val();
    $.ajax({
        type: 'post', //Definimos o método HTTP usado
        dataType: 'json',
        data: 'id=' + id + '&tabela=' + tabela + '&function=2',
        //Definimos o tipo de retorno
        url: 'seleciona.php', //Definindo o arquivo onde serão buscados os tabela
        success: function (tabela) {
            for (var i = 0; tabela.length > i; i++) {
                $('input[name=nome]').val(tabela[i].nome);
                $("input[name=email]").val(tabela[i].email);
                $("input[name=rg]").val(tabela[i].rg);
                $("input[name=tel1]").val(tabela[i].tel1);
                $("input[name=tel2]").val(tabela[i].tel2);
                var datan = tabela[i].datanasc.split("-");
                $("input[name=datanasc").val(datan[2] + "/" + datan[1] + "/" + datan[0]);
                $("select[name=sexo]").val(tabela[i].sexo);
                $("input[name=endereco]").val(tabela[i].endereco);
                $("input[name=numero]").val(tabela[i].numero);
                $("input[name=cep]").val(tabela[i].cep);
                $("input[name=cidade]").val(tabela[i].cidade);
                $("select[name=estado]").val(tabela[i].estado);
                $("select[name=batizado]").val(tabela[i].batizado);
                var datab = tabela[i].databatismo.split("-");
                $("input[name=databatismo]").val(datab[2] + "/" + datab[1] + "/" + datab[0]);
                $("input[name=ibatismo]").val(tabela[i].ibatismo);
                $("input[name=ultigreja]").val(tabela[i].ultigreja);
                $("input[name=ultpastor]").val(tabela[i].ultpastor);
                $("input[name=profissao]").val(tabela[i].profissao);
                $("select[name=ministerio]").val(tabela[i].ministerio);
                $("select[name=estcivil]").val(tabela[i].estcivil);
                $("input[name=nomeespos]").val(tabela[i].nomeespos);
                $("input[name=id]").val(tabela[i].id);
            }
            //$("#result").append(tabela);

        }
    });

}

function Delete(dado){
    $.ajax({
            type: "POST",
            data: dado + "&funcao=Deletar&tabela=membros",
            url: "cadastrar.php",
            success: function (result) {
                if (result == "success") {
                    $("#result").show();
                    $("#resultado").html("Membros excluidos com sucesso!!!");
                } else {
                    $("#result").show();
                    $("#resultado").html("Erro ao excluir membros " + result);
                }
                //$('#result').html(result);
                lista();
            }
            
    });
}
var countChecked = function() {
  var n = $( "input:checked" ).length;
  if(n >= 1){
      $("#Delet").show();
  }else{
      $("#Delet").hide();
  }
};
$(document).ready(function(){
    

countChecked();
}); 
$( "input[type=checkbox]" ).on( "click", countChecked );
var dados = "dados=";
    function Soma(id) {
  if(dados === "dados="){
      dados = dados + id;
  }else{
  dados = dados + "," + id;
  }
};