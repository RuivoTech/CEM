<?php
error_reporting(0);
ini_set(“display_errors”, 0 );
include("conecta.php");
if (isset($_POST["Seleciona"])) {
    montaSelect();
}

function montaSelect() {
    $mes = date("m");
    $tabela = $_POST['tabela'];
    if (isset($_POST["search"])) {
        $search = $_POST["search"];
        $pesq = " WHERE nome like '%" . $search . "%' OR email LIKE '%" . $search . "%'";
    } else {
        $pesq = "";
    }
    $query = mysql_query("SELECT * FROM " . $tabela . $pesq);
    $num = mysql_num_rows($query);
    if ($num != "0") {
        $estado = array(
            0 => "Acre",
            1 => "Alagoas",
            2 => "Amapá",
            3 => "Amazonas",
            4 => "Bahia",
            5 => "Ceará",
            6 => "Distrito Federal",
            7 => "Espírito Santo",
            8 => "Goiás",
            9 => "Maranhão",
            10 => "Mato Grosso",
            11 => "Mato Grosso do Sul",
            12 => "Minas Gerais",
            13 => "Pará",
            14 => "Paraíba",
            15 => "Paraná",
            16 => "Pernambuco",
            17 => "Piauí",
            18 => "Rio de Janeiro",
            19 => "Rio Grande do Norte",
            20 => "Rio Grande do Sul",
            21 => "Rondônia",
            22 => "Roraima",
            23 => "Santa Catarina",
            24 => "São Paulo",
            25 => "Sergipe",
            26 => "Tocantins",
        );
        $cols_SQL = array(
            "id" => "ID",
            "nome" => "Nome",
            "email" => "E-mail",
            "tel1" => "Telefone",
            "tel2" => "Celular",
            "datanasc" => "Data Nascimento",
            "endereco" => "Endereço",
            "numero" => "Número",
            "cep" => "CEP",
            "cidade" => "Cidade",
            "estado" => "Estado",
            "profissao" => "Profissão",
            "usuario" => "Usuário",
            "password" => "Senha",
            "nivel" => "Nível"
        );
        echo '<table id="listaMembros" border="1" align="center">
                 <thead>
                 <tr>';
        $colunas = mysql_query("SHOW COLUMNS FROM " . $tabela);
        while ($coluna = mysql_fetch_array($colunas)) {
            $coluna = $coluna["Field"];
            if (!$cols_SQL[$coluna]) {
                $null = $coluna;
            } else {
                echo "<th>" . $cols_SQL[$coluna] . "</th>";
            }
        }
        echo '<th>Excluir</th></tr>
                </thead>
                <tbody>';
        while ($row = mysql_fetch_array($query)) {
            $nasc = explode("-", $row["datanasc"]);
            echo "<tr id='" . $row["id"] . "' onMouseOver=\"javascript: this.className='trOver'\" onMouseOut=\"javascript: this.className='trOut'\" onClick=\"javascript:Seleciona(" . $row['id'] . ");\">\n";
            echo "<td class='id'>" . $row['id'] . "</td>\n";
            echo "<td class='nome'>" . $row["nome"] . "</td>\n";
            echo "<td class='email'>" . $row["email"] . "</td>\n";
            echo "<td class='tel1'>" . $row['tel1'] . "</td>\n";
            echo "<td>" . $row['tel2'] . "</td>\n";
            if (isset($row["datanasc"])) {
                echo "<td>" . $nasc["2"] . "/" . $nasc["1"] . "/" . $nasc["0"] . "</td>\n";
            }
            echo "<td>" . $row["endereco"] . "</td>\n";
            echo "<td>" . $row["numero"] . "</td>\n";
            echo "<td>" . $row["cep"] . "</td>\n";
            echo "<td>" . $row["cidade"] . "</td>\n";
            echo "<td>" . $estado[$row["estado"]] . "</td>\n";
            echo "<td>" . $row["profissao"] . "</td>\n";
            echo "<td><input type='checkbox' name='Delete' id='Delete' value='".$row['id']."' onClick=\"javascript: Soma(".$row['id']."); countChecked();\" />";
            echo "</tr>";
        }
        echo '</tbody>
            </table>';
    }
}
if($_POST["Espos"]){
    $tabela = $_POST["tabela"];
    $espos = $_POST["nome"];
    $sql = "SELECT nome FROM ".$tabela." WHERE nome LIKE '%".$espos."%'";
    while($row = mysql_fetch_array($query)){
        echo $row["nome"]."<br/>";
    }
}
if ($_POST["function"] == "2") {
    $id = $_POST['id'];
    $table1 = $_POST['tabela'];
    $qryLista = mysql_query("SELECT * FROM " . $table1 . " WHERE id='" . $id . "'");
    while ($resultado = mysql_fetch_assoc($qryLista)) {
        $vetor[] = $resultado;
    }

    //Passando vetor em forma de json
    echo json_encode($vetor);
}
if ($_POST["function"] == 3) {
    $id2 = $_POST['id'];
    $table2 = $_POST['tabela'];
    if ($id2 != null) {
        $qry = mysql_query("SELECT * FROM " . $table2 . " WHERE MONTH(datanasc)='$id2'");
    } else {
        $qry = mysql_query("SELECT * FROM " . $table2);
    }
    $numero = mysql_num_rows($qry);
    if ($numero != "0") {
        echo '<table id="Aniversario" border="1" align="center">
                 <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Data<br>Nascimento</th>
            <th>Endere&ccedil;o</th>
            <th>Número</th>
            <th>Idade</th>
        </tr>
                </thead>
                <tbody>';
        while ($lista = mysql_fetch_array($qry)) {
            $estado = $lista["estado"];
            $est = mysql_query("SELECT * FROM estados WHERE id='$estado'");
            $date = new DateTime($lista["datanasc"]); // data de nascimento
            $dataatual = new DateTime("now");
            $interval = date_diff($date, $dataatual); // data definida
            $nasc1 = explode("-", $lista['datanasc']);


            echo "<tr onMouseOver=\"javascript: this.className='trOver'\" onMouseOut=\"javascript: this.className='trOut'\"  onClick=\"javascript:Seleciona(" . $lista['id'] . ");\">";
            echo "<td class='ID'>" . $lista["id"] . "</td>";
            echo "<td class='nome'>" . $lista["nome"] . "</td>";
            echo "<td class='email'>" . $lista["email"] . "</td>";

            echo "<td class='tel1'>" . $lista['tel1'] . "</td>";
            echo "<td>" . $lista['tel2'] . "</td>";
            if (isset($lista["datanasc"])) {
                echo "<td>" . $nasc1["2"] . "/" . $nasc1["1"] . "/" . $nasc1["0"] . "</td>";
            }
            echo "<td>" . $lista["endereco"] . "</td>";
            echo "<td>" . $lista["numero"] . "</td>";
            $meses = $interval->format('%m');
            $anos = $interval->format('%Y');
            if ($anos < "1") {
                $idade = $meses . " meses";
            } else {
                if ($anos == "1") {
                    $idade = $anos . " ano";
                } else {
                    $idade = $anos . " anos";
                }
            }
            echo "<td>" . $idade . "</td>";
            echo "</tr>";
        }
        echo '</tbody>
            </table>';
    }
}
if ($_POST["function"] == 4) {
    $sexo = $_POST['sexo'];
    $faixa = $_POST['faixa'];
    $table3 = $_POST['tabela'];
    if ($sexo != null) {
        $qry = mysql_query("SELECT * FROM " . $table3 . " WHERE sexo='$sexo'");
    } else {
        $qry = mysql_query("SELECT * FROM " . $table3);
    }
    $numero = mysql_num_rows($qry);
    if ($numero != "0") {
        echo '<table id="Sexo" border="1" align="center">
                 <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Data<br>Nascimento</th>
            <th>Endere&ccedil;o</th>
            <th>Número</th>
        </tr>
                </thead>
                <tbody>';
        while ($lista = mysql_fetch_array($qry)) {
            $date = new DateTime($lista["datanasc"]); // data de nascimento
            $dataatual = new DateTime("now");
            $interval = date_diff($date, $dataatual); // data definida
            $nasc1 = explode("-", $lista['datanasc']);
            $anos = $interval->format('%Y');
            $arrFaixa = array(
                0 => true,
                1 => $anos <= 3,
                2 => $anos > 3 and $anos <= 10,
                3 => $anos > 10 and $anos <= 17,
                4 => $anos >17 and $anos <= 24,
                5 => $anos > 24
            );
            if(!$arrFaixa[$faixa]){
                echo "";
            } else {
                echo "<tr onMouseOver=\"javascript: this.className='trOver'\" onMouseOut=\"javascript: this.className='trOut'\"  onClick=\"javascript:Seleciona(" . $lista['id'] . ");\">";
                echo "<td class='ID'>" . $lista["id"] . "</td>";
                echo "<td class='nome'>" . $lista["nome"] . "</td>";
                echo "<td class='email'>" . $lista["email"] . "</td>";

                echo "<td class='tel1'>" . $lista['tel1'] . "</td>";
                echo "<td>" . $lista['tel2'] . "</td>";
                if (isset($lista["datanasc"])) {
                    $nasc1 = explode("-", $lista["datanasc"]);
                    echo "<td>" . $nasc1["2"] . "/" . $nasc1["1"] . "/" . $nasc1["0"] . "</td>";
                }
                echo "<td>" . $lista["endereco"] . "</td>";
                echo "<td>" . $lista["numero"] . "</td>";
                echo "</tr>";
            }
        }
        echo '</tbody>
            </table>';
    }
}