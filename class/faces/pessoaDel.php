<?php

$pessoa = "";

if (!empty($_GET)) {
    $idpessoa = intval($_GET['a_pessoa']);

    include("../../class/conection/database.php");
    include("../../class/DAO/pessoaDAO.php");
    include("../../class/pojo/pojoPessoa.php");

    $pessoa = new pessoaDAO();
    $pessoa->delete($idpessoa);

    header('Location: /index.php');
}
