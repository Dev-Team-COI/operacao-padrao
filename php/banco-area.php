<?php

require_once("conecta.php");	

function listaComponenteEmpilhadeira($conexao) {
	$empilhadeiras = array();
	$query = "select * from componente where tipo = 'Empilhadeira' order by componente;";
    
	$resultado = mysqli_query($conexao, $query);
	while($empilhadeira = mysqli_fetch_assoc($resultado)) {
		array_push($empilhadeiras, $empilhadeira);
	}
	return $empilhadeiras;
}