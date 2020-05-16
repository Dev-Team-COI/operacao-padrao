<?php

require_once("conecta.php");	

function listaMineral($conexao) {
	$minerais= array();
	$query = "select * from mineral order by nomeMineral";
    
	$resultado = mysqli_query($conexao, $query);
	while($mineral = mysqli_fetch_assoc($resultado)) {
		array_push($minerais, $mineral);
	}
	return $minerais;
}