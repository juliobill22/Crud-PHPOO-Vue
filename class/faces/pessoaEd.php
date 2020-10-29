<?php

$pessoa = "";
$nome = "";
$idade = "";

if (!empty($_GET)) {

    $nomeErro = null;
    $idadeErro = null;
    $pessoaErro = null;
    $validou = true;

    $pessoa = $_GET['a_pessoa'];
    $nome = $_GET['a_nome'];
    $idade = $_GET['a_idade'];
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <div class="tela-inc-edit">
            <div class="tela-inc-edit-child">

                <a href="../../index.php">Index</a>
                <form
                    id="app"
                    @submit="checkForm"
                    action="../../class/faces/pessoaEd.php"
                    method="post">
                    <p v-if="errors.length">
                        <b>Por favor, corrija o(s) seguinte(s) erro(s):</b>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
                    </p>

                    <p>
                        <label for="pessoa">Código</label>
                        <input
                            id="inc-pessoa"
                            v-model="pessoa"
                            type="text"
                            name="a_pessoa">
                    </p>

                    <p>
                        <label for="name">Nome</label>
                        <input
                            id="inc-nome"
                            v-model="name"
                            type="text"
                            name="a_nome"
                            autofocus="true">
                    </p> 

                    <p>
                        <label for="age">Idade</label>
                        <input
                            id="inc-idade"
                            v-model="age"
                            type="number"
                            name="a_idade"
                            min="0"
                            data-mask="(00) 00000-0000">
                    </p>

                    <input
                        type="submit"
                        value="Salvar">
                    </p>
                </form>        
            </div>
        </div>
        <script src="../js/js-index.js" type="text/javascript"></script>       

    </body>

</html>

<?php
if (!empty($_POST)) {
    $nomeErro = null;
    $idadeErro = null;
    $pessoaErro = null;
    $validou = true;
    $pessoa = null;

    $pessoa = $_POST['a_pessoa'];
    $nome = $_POST['a_nome'];
    $idade = $_POST['a_idade'];

    if (empty($nome)) {
        $nomeErro = 'Por favor digite o seu nome!';
        $validou = false;
    }
    if (empty($idade)) {
        $idadeErro = 'Por favor digite o idade!';
        $validou = false;
    }

    if ($validou) {

        include("../conection/database.php");
        include("../DAO/pessoaDAO.php");
        include("../pojo/pojoPessoa.php");

        $cDAO = new pessoaDAO();
        $cont = new pojoPessoa();

        $cont->setIdPessoa($pessoa);
        $cont->setNome($nome);
        $cont->setIdade($idade);

        $cDAO->edit($cont);

        header('Location: /index.php');
    } else {
        
    }
}


?>