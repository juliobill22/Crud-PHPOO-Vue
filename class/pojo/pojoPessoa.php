<?php

/**
 * Description of pojoPessoa
 *
 * @author juliobillschvenger
 */
class pojoPessoa {

    private $idpessoa;
    private $nome;
    private $idade;

    public function __construct() {
        
    }

    public function getIdPessoa() {
        return $this->idpessoa;
    }

    public function setIdPessoa($idPessoa) {
        $this->idpessoa = $idPessoa;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

}

?>