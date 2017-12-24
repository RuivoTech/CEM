<?php

include("conecta.php");
switch ($_POST['funcao']) {
    case "Cadastrar": Cadastrar();
        break;
    case "Editar": Editar();
        break;
    case "Deletar": Deletar();
        break;
}

function Cadastrar() {
    $campos = null;
    $valores = null;
    $resultado = null;
    $tabela = $_POST["tabela"];
    while (list($campo, $valor) = each($_POST)) {
        unset($_POST["con_password"]);
        unset($_POST["funcao"]);
        if (($valor == $_POST["datanasc"] and $_POST['datanasc'] != null) or ($valor == $_POST["databatismo"] and $_POST['databatismo'] != null)) {
            $data = explode("/", $valor);
            $valor = $data["2"] . "-" . $data["1"] . "-" . $data["0"];
        }
        if ($campo == 'tabela' or $campo == "con_password") {
            $campos = $campos;
        } else {
            if ($campos == null) {
                $campos = $campo;
            } else {
                $campos = $campos . ", " . $campo;
            }
        }
        if ($valor == "membros" or $valor == "usuario" or $valor == "freq") {
            $valores = $valores;
        } else {
            if ($valores == null) {
                $valores = "'" . $valor . "'";
            } else {
                $valores = $valores . ", '" . $valor . "'";
            }
        }
    }
    $sql = "insert into " . $tabela . " (" . $campos . ")VALUES(" . $valores . ")";
    if (mysql_query($sql)) {
        echo "success";
    } else {
        echo "Error";
        echo $sql;
    }
}

function Editar() {
    $campos = null;
    $valores = null;
    $resultado = null;
    $tabela = $_POST["tabela"];
    $id = $_POST['id'];
    while (list($campo, $valor) = each($_POST)) {
        unset($_POST['tabela']);
        unset($_POST['id']);
        unset($_POST['funcao']);
        if ($valor == $_POST['datanasc']) {
            $data = explode("/", $valor);
            $valor = $data["2"] . "-" . $data["1"] . "-" . $data["0"];
        }
        if($campo == "funcao"){
            $resultado = $resultado;
        }
        if($valor == "Cadastrar" or $valor == "Editar" or $valor == "Deletar"){
            $resultado = $resultado;
        }
        if ($resultado == null) {
            $resultado = $campo . "='" . $valor."'";
        } else {
            $resultado = $resultado . ", " . $campo . "='" . $valor."'";
        }
    }
    $sql = "UPDATE " . $tabela . " SET " . $resultado . " WHERE id='" . $id."'";
    if (mysql_query($sql)) {
        echo "success";
    } else {
        echo "error ";
    }
}
function Deletar(){
    if(isset($_POST['id'])){
        $tabela = $_POST['tabela'];
        $id = $_POST['id'];
        $sql = "DELETE FROM ".$tabela." WHERE id='".$id."'";
    }
    if(isset($_POST["dados"])){
        $tabela = $_POST["tabela"];
        $dados = $_POST["dados"];
        $sql = "DELETE FROM ".$tabela." WHERE id IN (".$dados.")";
    }
    if($result = mysql_query($sql)){
        echo "success";
    }else{
        echo "error ".$result;
    }
}

?>