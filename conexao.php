<?php
/*
1) Considerando a tabela: Cliente(codCliente, nome, CPF, email).
Faça um funções para cada situação:
a) Crie uma conexão com o banco de dados
b) Insira um novo cliente na tabela (dados passados por parâmetro)
c) Exclua um cliente da tabela (codCliente passado por parâmetro)
*d) Altere um cliente de codCliente passado por parâmetro bem como
novo nome, cpf e email
e) Busque um cliente de codigo passado por parâmetro e retorne um
vetor com os seus dados
f) Busque os X clientes (limit x e offset passados por parâmetro) e
retorne um (?????) */

    
function criaConexao(){
    $scon="port=5432 dbname=lojaviews user=postgres password=postgres";
    return pg_connect($scon);
}

function insereCliente ($nome, $cpf, $email){ //???
    $conn = criaConexao();
    $sql2="INSERT INTO cliente(nome,cpf,email) VALUES ($1,$2,$3)";
    $vetor=array($nome,$cpf,$email);
    pg_query_params($conn,$sql2,$vetor);
    pg_close($conn);
}

/*function insereCliente ($nome, $cpf, $email){ //???
    $conn = criaConexao();
    //$sql2="INSERT INTO cliente(nome,cpf,email) VALUES ('".
    //pg_escape_string($nome)."','".$cpf."','".$email."')";
    //INSERT INTO CLIENTE (nomr,cpf,email) VALUES ('D\'avila,'98272','julio@email.com')
    pg_query($conn,$sql2);
    pg_close($conn);
}*/

function deletaCliente($codcliente){
    $conn = criaConexao();
    $sql="DELETE FROM cliente WHERE codcliente=$1";
    $res = pg_query_params($conn,$sql,array($codcliente));
    pg_close($conn);
}

function listaCliente(){
    $conn = criaConexao();
    $sql = 'select * from cliente';
    $res=pg_query($conn,$sql);
    $listCli = array();
    while ($cliente = pg_fetch_assoc($res)){
        array_push($listCli,$cliente);
    }
    pg_close($conn);
    return $listCli;
}


function update($codcliente,$nome,$cpf,$email){
    $conn = criaConexao();
    $s="UPDATE Cliente SET codcliente=$4, nome=$1, cpf = $2, email=$3";
    $res = pg_query_params($conn,$sql,array($codcliente,$nome,$cpf,$email));
    pg_close($conn);
    //$up="UPDATE cliente SET nome=$nome WHERE codCliente=$cod";
    //$res = pg_query_params($conn,$sql,array($id));
    
}

function buscaCliente($codcliente){
    $conn= criaConexao();
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
    $conn= criaConexao();
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




//$c = new Cliente($_POST[]);
//$cdao= new ClienteDao();
//$cdao->inserir($c);
//function listar($x,$y)
//pg_query_params($con,"select * from cliente offset $1 limit $2")
//insereCliente("julio","0986542","julio@gmail.com");
//var_dump(listaCliente());
//deletaCliente(8);
//echo phpinfo();
//var_dump(buscaCliente(7));
var_dump(buscaXclientes(2,3));

?>