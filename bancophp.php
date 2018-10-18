<?php

//as funcoes que envolvem banco de dados começam com "Pg" no site do php
    
    /*echo "<h1> olá mundo</h1>";

    $scon = "port=5432 dbname=lojaExe user=postgres password=postgres"; 
    $conn = pg_connect($scon);

	print_r($conn);

    $sql="select * from cliente";
    
    $sql2="INSERT INTO cliente(nome,cpf,email) VALUES ($1,$1,!3)";
    $vetor=array("jose","52867683","jose@gmail.com");

    pg_query_params($conn,$sql2,$vetor);

    echo "----<br>";
	$res=pg_query($conn,$sql);
	print_r ($res);
	
	echo "----<br>";
	while($cliente = pg_fetch_assoc($res)){ //percorre as linhas
		echo($cliente);
		echo "<br>. . .";
		print_r ($cliente);
		echo "<br>---<br>";
		
		echo "<h3>".$cliente["nome"]."</h3>";
    }*/


    class Cliente{


    public function criaConexao(){

        $scon="port=5432 dbname=lojaExe user=postgres password=postgres";
        return pg_connect($scon);
    }



    public function listaCliente(){
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

    function insereCliente ($nome, $cpf, $email){
        $conn = criaConexao();
        $sql2="INSERT INTO cliente(nome,cpf,email) VALUES ($1,$1,!3)";
        $vetor=array($nome,$cpf,$email);
        pg_query_params($conn,$sql2,$vetor);

        pg_close($conn);
    }

    function deletaCliente($id){
        $conn = criaConexao();
        $sql="DELETE FROM cliente WHERE id=$1";
        $res = pg_query_params($conn,$sql,array($id));
        pg_close($conn);

    }

    function update($nome,$cpf,$email,$id){
        $conn = criaConexao();
        $s="UPDATE Cliente SET nome=$1, cpf = $2, email=$3, id=$5";
        $res = pg_query_params($conn,$sql,array($nome,$cpf,$email,$id));
        //$up="UPDATE cliente SET nome=$nome WHERE codCliente=$cod";
        //$res = pg_query_params($conn,$sql,array($id));
        
    }
}


// 1: fazer uma funcao que deleta um cliente (id passado por parametro)
// 2: fazer uma funcao que retorna um vetor de  clientes, listando todos
// 3: fazer uma funcao que insere um cliente


 insereCliente("rodolfo","52860003","rodolfo@gmail.com");

$c = new Cliente($_POST[]);
$cdao= new ClienteDao();
$cdao->inserir($c);

function listar($x,$y)
pg_query_params($con,"select * from cliente offset $1 limit $2")

?>