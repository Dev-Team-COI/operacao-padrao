<?php

require_once("conecta.php");	

function listaEquipamentoDescarregamento($conexao) {
	$equipamentos = array();
	$query = "select * from equipamento where tipo_equipamento = 'Empilhadeira' order by tag_equipamento";
    
	$resultado = mysqli_query($conexao, $query);
	while($equipamento = mysqli_fetch_assoc($resultado)) {
		array_push($equipamentos, $equipamento);
	}
	return $equipamentos;
}

function listaProduto($conexao) {
	$produtos = array();
	$query = "select * from produto order by nome_produto";
    
	$resultado = mysqli_query($conexao, $query);
	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

function listaComponenteEmpilhadeira($conexao) {
	$componentes = array();
	$query = "select * from componente where tipo = 'Empilhadeira' order by componente;";
    
	$resultado = mysqli_query($conexao, $query);
	while($componente = mysqli_fetch_assoc($resultado)) {
		array_push($componentes, $componente);
	}
	return $componentes;
}

