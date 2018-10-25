<?php
include ('includes/cliente.php'); 
class clienteDAO{
    
    public function criaConexao(){
    $scon="port=5432 dbname=lojaviews user=postgres password=postgres";
    return pg_connect($scon);
    }
    public function insereCliente ($cliente){ 
        $conn = $this->criaConexao();
        $sql2="INSERT INTO cliente(nome,cpf,email) VALUES ($1,$2,$3)";
        $vetor=array($this->$cliente->getnome(),$this->$cliente->getcpf(),$this->$cliente->getemail());
        pg_query_params($conn,$sql2,$vetor);
        pg_close($conn);
    }
    public function deletaCliente($cliente){
        $conn = $this->criaConexao();
        $sql="DELETE FROM cliente WHERE cpf=$1";
        $res = pg_query_params($conn,$sql,array($this->$cliente->getcpf()));
        pg_close($conn);
    }
    function listaCliente(){
        $conn = $this->criaConexao();
        $sql = 'select * from cliente';
        $res=pg_query($conn,$sql);
        $listCli = array();
        while ($cliente = pg_fetch_assoc($res)){
            array_push($listCli,$cliente);
        }
        pg_close($conn);
        return $listCli;
    }
    public function buscaCliente($codcliente){
        $conn = $this->criaConexao();
        $sql = "select * from cliente where codcliente=$1";
        $v=array($codcliente);
        $res = pg_query_params($conn,$sql,$v);
        $Cli = array();
        while ($cliente = pg_fetch_assoc($res)){
            array_push($Cli,$cliente);
        }
        return $Cli;
        pg_close($conn);
    }
        
    function buscaXclientes($l,$o){
        $conn = $this->criaConexao();
        $sql = "select * from cliente offset $1 limit $2";
        $v=array($l,$o);
        $res = pg_query_params($conn,$sql,$v);
        $Cli = array();
        while ($cliente = pg_fetch_assoc($res)){
            array_push($Cli,$cliente);
        }
        return $Cli;
        pg_close($conn);
    }
}




?>