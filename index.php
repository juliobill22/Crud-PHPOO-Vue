<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Pessoas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../class/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="../class/js/js-index.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <!--FRAMES DE INCLUSÃO-->
        <div>
            <div>
                <div>
                    <div>
                        <div>
                            <a id="btn-inc-pessoa" href="class/faces/pessoaInc.php">+</a>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--LISTA DE PESSOAS-->
        <div>
            <div>
                <p></p><br>
                <div id="index-list-pessoas">

                    <?php
                    require("./class/conection/database.php");
                    require("./class/DAO/pessoaDAO.php");
                    require("./class/pojo/pojoPessoa.php");
                    require("./class/faces/pessoaList.php");
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>