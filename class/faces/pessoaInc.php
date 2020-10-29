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
                    action="../../class/faces/pessoaInc.php"
                    method="post">
                    <p v-if="errors.length">
                        <b>Por favor, corrija o(s) seguinte(s) erro(s):</b>
                    <ul>
                        <li v-for="error in errors">{{ error }}</li>
                    </ul>
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
                            min="0">
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
$nome = "";
$idade = "";

if (!empty($_POST)) {

    $nomeErro = null;
    $idadeErro = null;
    $validou = true;

    $nome = $_POST['a_nome'];
    $idade = $_POST['a_idade'];

    //validação no servidor
    if (empty($nome)) {
        $nomeErro = 'Por favor digite o seu nome!';
        $validou = false;
    }
    if (empty($idade)) {
        $telefoneErro = 'Por favor digite a idade!';
        $validou = false;
    }

    if ($validou) {

        include("../conection/database.php");
        include("../DAO/pessoaDAO.php");
        include("../pojo/pojoPessoa.php");

        $cDAO = new pessoaDAO();
        $pessoa = new pojoPessoa();

        $pessoa->setNome($nome);
        $pessoa->setIdade($idade);

        $cDAO->insert($pessoa);

        echo $pessoa->getIdade();

        header('Location: /index.php');
    } else {
        
    }
}
?>    