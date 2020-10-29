<?php

$pessoa = new pessoaDAO();
$result = $pessoa->lists();

if ($result->num_rows > 0) {
    echo "<table class='tb-list-pessoas'>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr id='" . $row["IDPESSOA"] . "'>"
        . "<td id='td-id-nome'>" . $row["NOME"] . "</td>"
        . "<td id='td-id-idade'>" . $row["IDADE"] . "</td>"
        . "<td id='td-id-alterar'><a class='style-button-edit' href=../../class/faces/pessoaEd.php?"
        . "a_pessoa=" . $row["IDPESSOA"] . "&"
        . "a_nome=" . $row["NOME"] . "&"
        . "a_idade=" . $row["IDADE"] . ">Alterar</a></td>"
        . "<td id='td-id-exluir'><a class='style-button-excluir' href=../../class/faces/pessoaDel.php?"
        . "a_pessoa=" . $row["IDPESSOA"] . "&"
        . "a_nome=" . $row["NOME"] . "&"
        . "a_idade=" . $row["IDADE"] . ">Excluir</a></td>"
        . "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}