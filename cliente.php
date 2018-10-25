
<?php

class Cliente {

    public $nome;
    public $cpf;
    public $email;
    public $codcliente;
    public function Cliente($nome,$cpf,$email){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }
    public function getnome(){
        return $this-> nome;
    }
    public function getcpf(){
        return $this-> cpf;
    }
    public function getemail(){
        return $this-> email;
    }
    public function getcodcliente(){
        return $this-> codcliente;
    }
    public function setnome($nome){
        return $this->nome = $nome;
    }
    public function setcpf($cpf){
        return $this->cpf = $cpf;
    }
    
    public function setemail($email){
        return $this->email = $email;
    }
    public function setcodcliente($cod){
        return $this->codcliente = $cod;
    }


}


$cliente1 = new Cliente("joao","3332244","joao@gmail.com");

echo $cliente1->getnome();



?>