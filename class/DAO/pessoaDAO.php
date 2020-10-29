<?php
/**
 * @author juliobillschvenger
 */


class pessoaDAO {
    
    public function __construct() {}
    
    public static function insert($objeto){
        try {
            $conn = database::openConection();
            $sql = " INSERT INTO `pessoadb`.`PESSOA` ("
                    . "nome, "
                    . "idade) "
                    . "VALUES ('"
                    . $objeto->getNome()  ."','"
                    . $objeto->getIdade() . "');";
            $conn->query($sql);
            echo $sql;
            echo "Nova pessoa criado com sucesso!";
        } catch (Exception $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        database::closeConection();
    }        
    
    public static function edit($objeto){
        try {
            $conn = database::openConection();
            $sql = "UPDATE `pessoadb`.`PESSOA` SET "
                    . "  NOME = '" . $objeto->getNome() ."'"
                    . ", IDADE = '" . $objeto->getIdade() ."'"
                    . " WHERE (IDPESSOA = '" . $objeto->getIdPessoa() ."');";
            $conn->query($sql);
            echo $sql;
            echo "Pessoa alterado com sucesso!";
        } catch (Exception $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        database::closeConection();
    }
    
    public static function delete($cod){
        try {
            $conn = database::openConection();
            $sql = " DELETE FROM `pessoadb`.`PESSOA` WHERE (IDPESSOA = '". $cod ."')";
            return $conn->query($sql);
        } catch (Exception $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        database::closeConection();
    }
    
    public static function locateForCod($cod){
        try {
            $conn = database::openConection();
            $sql = " SELECT NOME, IDPESSOA, NOME, IDADE FROM `pessoadb`.`PESSOA` WHERE IDPESSOA = $cod order by IDPESSOA";
            return $conn->query($sql);
        } catch (Exception $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        database::closeConection();        
    }    
    
    public static function lists(){
        try {
            $conn = database::openConection();
            return $conn->query("SELECT IDPESSOA, NOME, IDADE FROM `pessoadb`.`PESSOA`");
        } catch (Exception $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        database::closeConection();        
    }
}

?>