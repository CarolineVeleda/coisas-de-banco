
<?php

	echo "<h1> olá mundo</h1>";
	echo "<input>";
	$conn = pg_connect("port=5432 dbname=listaConsultas user=postgres password=postgres"); //lugar que eu quero salvar/mexer (banco de dados)
	$sql="select * from departamento";

	print_r($conn);

	echo "----<br>";
	$res=pg_query($conn,$sql);
	print_r ($res);
	
	echo "----<br>";
	while($departamento = pg_fetch_assoc($res)){ //percorre as linhas
		echo($cliente);
		echo "<br>. . .";
		print_r ($departamento);
		echo "<br>---<br>";
		
		echo "<option>".$departamento["nome"]."</option>";
	}


?>



/*<? php
	
	echo "escreve num tetahead";
	$d = fgets(STDIN);
	echo "4x".$d."=".($d"4")."\n";
	$vet[]=array(2,3,4,5);
	
	for ($i=0;$i<$d;$i++){
		echo $vet[$i].",";
	)


	print "\nprogramo feliz :D \n"
?>*/
