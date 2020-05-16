<?php

require_once("conecta.php");	

function listaStatus($conexao) {
	$status= array();
	$query = "select * from status order by nomeStatus";
    
	$resultado = mysqli_query($conexao, $query);
	while($statu = mysqli_fetch_assoc($resultado)) {
		array_push($status, $statu);
	}
	return $status;
}