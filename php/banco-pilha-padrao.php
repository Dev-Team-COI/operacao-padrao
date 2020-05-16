<?php
require_once("conecta.php");			

function inserePilhaPadrao($conexao, $pilha){

     $query = "insert into cadastro_pilha_padrao (turno_cadastro, turma_cadastro, pilha_cadastro,material_cadastro, data_cadastro, balizamento_cadastro,tipoempilhamento_cadastro, lotes_cadastro, obs_cadastro, id_usuario, atualizacao_cadastro, id_equipamento, padrao_cadastro, id_pilha_padrao, id_periodo_chuvoso) values ('{$pilha->turno_cadastro}','{$pilha->turma_cadastro}','{$pilha->pilha_cadastro}','{$pilha->material_cadastro}','{$pilha->data_cadastro}','{$pilha->balizamento_cadastro}', '{$pilha->tipoempilhamento_cadastro}', '{$pilha->lotes_cadastro}','{$pilha->obs_cadastro}',{$pilha->id_usuario}, '{$pilha->atualizacao_cadastro}', {$pilha->id_equipamento}, '{$pilha->padrao_cadastro}',{$pilha->id_pilha_padrao},{$pilha->id_periodo_chuvoso})";
     return mysqli_query($conexao, $query);
}


//---------------------------------------------------------------------------------
//Pilha padrão
//---------------------------------------------------------------------------------
function insereCheckPilhaPadrao($conexao,$pilhaPadrao){
     $query = "insert into pilha_padrao (angulo_empilhamento,tipo_empilhamento,cabecao_empilhamento,capacidade_empilhamento,espacamento_pilha, espacamento_berma, espacamento_via) values ('{$pilhaPadrao->angulo_empilhamento}','{$pilhaPadrao->tipo_empilhamento}','{$pilhaPadrao->cabecao_empilhamento}','{$pilhaPadrao->capacidade_empilhamento}','{$pilhaPadrao->espacamento_pilha}','{$pilhaPadrao->espacamento_berma}','{$pilhaPadrao->espacamento_via}')";
     return mysqli_query($conexao,$query);
}

function ultimoRegistroPilhaPadrao($conexao){
     
	$query = "SELECT MAX(id_pilha_padrao) as ultimo FROM pilha_padrao";
	$resultado = mysqli_query($conexao, $query);

	while($ult = mysqli_fetch_assoc($resultado) ) {
		$ultimo = $ult['ultimo'];
	}
	
	return $ultimo;

}
//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------


//---------------------------------------------------------------------------------
//Check Área
//---------------------------------------------------------------------------------
function insereCheckArea($conexao,$checkArea){
     $query = "insert into periodo_chuvoso (choveu, agua_base, saldo_pilha, deslizamento) values ('{$checkArea->choveu}','{$checkArea->agua_base}','{$checkArea->saldo_pilha}','{$checkArea->deslizamento}')";
     return mysqli_query($conexao,$query);
}

function ultimoRegistroCheckArea($conexao){
     
	$query = "SELECT MAX(id_periodo_chuvoso) as ultimo FROM periodo_chuvoso";
	$resultado = mysqli_query($conexao, $query);

	while($ult = mysqli_fetch_assoc($resultado) ) {
		$ultimo = $ult['ultimo'];
	}
	
	return $ultimo;

}

//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------


function listaCadastrosMes($conexao, $mes){
	$query = "SELECT * FROM cadastro_pilha_padrao, equipamento where cadastro_pilha_padrao.id_equipamento = equipamento.id_equipamento AND MONTH(cadastro_pilha_padrao.data_cadastro) = {$mes} ORDER BY cadastro_pilha_padrao.data_cadastro" ;
	$resultado =  mysqli_query($conexao, $query);
	$pilhas = array();    
	   
	while($pilha = mysqli_fetch_assoc($resultado) ) {
		array_push($pilhas, $pilha);
	}
	return $pilhas;
  }

  function listaTurnos($conexao){
	$query = "SELECT * FROM turno";
	$resultado =  mysqli_query($conexao, $query);
	$turnos = array();    
	   
	while($turno = mysqli_fetch_assoc($resultado) ) {
		array_push($turnos, $turno);
		
	}
	return $turnos;
  }

  function listaEscalas($conexao){
	$query = "SELECT * FROM turma";
	$resultado =  mysqli_query($conexao, $query);
	$escalas = array();    
	   
	while($escala = mysqli_fetch_assoc($resultado) ) {
		array_push($escalas, $escala);

	}
	return $escalas;
  }

  function listaTipoEmpilhamento($conexao){
	$query = "SELECT * FROM tipo_empilhamento";
	$resultado =  mysqli_query($conexao, $query);
	$tipos = array();    
	   
	while($tipo = mysqli_fetch_assoc($resultado) ) {
		array_push($tipos, $tipo);

	}
	return $tipos;
  }
  
  function listaCadastroIndividual($conexao, $idCadastro){
	
	//$query = "select p.*, c.nome as nome_escala, d.nome as nome_cargo, f.nome as nome_supervisao from funcionario as p join escala as c on p.id_escala = c.id join cargo as d on p.id_cargo = d.id join supervisao as f on p.id_supervisao = f.id and p.matricula = {$matricula}";
	$query = "SELECT *, matricula_usuario, nome_usuario, tag_equipamento, nome_produto FROM cadastro_pilha_padrao, usuario,equipamento, produto WHERE cadastro_pilha_padrao.id_usuario = usuario.id_usuario AND cadastro_pilha_padrao.id_equipamento = equipamento.id_equipamento AND cadastro_pilha_padrao.material_cadastro = produto.id_produto AND  id_cadastro = {$idCadastro}";
	$resultado =  mysqli_query($conexao, $query);
	
	return mysqli_fetch_assoc($resultado);
}


function listaCheckAreaIndividual($conexao, $idCheck){
     
	$query = "SELECT * FROM periodo_chuvoso WHERE id_periodo_chuvoso = {$idCheck}";
	$resultado = mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado);
}

function listaPilhPadraoIndividual($conexao, $idPilha){
     
	$query = "SELECT * FROM pilha_padrao WHERE id_pilha_padrao = {$idPilha}";
	$resultado = mysqli_query($conexao, $query);

	return mysqli_fetch_assoc($resultado);
}


function alteraPilhaPadrao($conexao, $pilha) {
	$query = "update cadastro_pilha_padrao set turno_cadastro='{$pilha->turno_cadastro}',turma_cadastro='{$pilha->turma_cadastro}',pilha_cadastro='{$pilha->pilha_cadastro}',material_cadastro='{$pilha->material_cadastro}',data_cadastro='{$pilha->data_cadastro}',balizamento_cadastro='{$pilha->balizamento_cadastro}',tipoempilhamento_cadastro='{$pilha->tipoempilhamento_cadastro}',lotes_cadastro='{$pilha->lotes_cadastro}',obs_cadastro='{$pilha->obs_cadastro}',id_usuario='{$pilha->id_usuario}',atualizacao_cadastro='{$pilha->atualizacao_cadastro}',id_equipamento='{$pilha->id_equipamento}',padrao_cadastro='{$pilha->padrao_cadastro}' where id_cadastro ={$pilha->id_cadastro}" ; 
	 
	return mysqli_query($conexao, $query);
}

function alteraCheckArea($conexao, $checkArea, $idCheck) {
	$query = "update periodo_chuvoso set choveu='{$checkArea->choveu}',agua_base='{$checkArea->agua_base}',saldo_pilha='{$checkArea->saldo_pilha}',deslizamento='{$checkArea->deslizamento}' where id_periodo_chuvoso = {$idCheck}" ; 
	 
	return mysqli_query($conexao, $query);
}

function alteraCheckPilhaPadrao($conexao, $checkPilha, $idCheck) {
	$query = "update pilha_padrao set angulo_empilhamento='{$checkPilha->angulo_empilhamento}',tipo_empilhamento='{$checkPilha->tipo_empilhamento}',cabecao_empilhamento='{$checkPilha->cabecao_empilhamento}',capacidade_empilhamento='{$checkPilha->capacidade_empilhamento}',espacamento_pilha='{$checkPilha->espacamento_pilha}',espacamento_berma='{$checkPilha->espacamento_berma}',espacamento_via='{$checkPilha->espacamento_via}' where id_pilha_padrao = {$idCheck}" ; 
	 
	return mysqli_query($conexao, $query);
}

function removeCheckArea($conexao, $id) {
    $query = "delete from periodo_chuvoso where id_periodo_chuvoso = {$id}";
    mysqli_query($conexao, $query);
}

function removeCheckPilhaPadrao($conexao, $id) {
    $query = "delete from pilha_padrao where id_pilha_padrao = {$id}";
    mysqli_query($conexao, $query);
}

function removePilhaPadrao($conexao, $id) {
    $query = "delete from cadastro_pilha_padrao where id_cadastro = {$id}";
    mysqli_query($conexao, $query);
}

function contadorPilhas($conexao, $mes){
	$query = "select count(id_cadastro) as total from cadastro_pilha_padrao WHERE MONTH(data_cadastro) = {$mes}";
	$resultado =  mysqli_query($conexao, $query);
		
	return mysqli_fetch_assoc($resultado);
}

function contadorPilhaPadrao($conexao, $mes){
	$query = "select count(padrao_cadastro) as total_padrao from cadastro_pilha_padrao where padrao_cadastro = 'Padrão' AND MONTH(data_cadastro) = {$mes}";
	$resultado =  mysqli_query($conexao, $query);
		
	return mysqli_fetch_assoc($resultado);
}
function contadorPilhaNaoPadrao($conexao, $mes){
	$query = "select count(padrao_cadastro) as total_npadrao from cadastro_pilha_padrao where padrao_cadastro = 'Não Padrão' AND MONTH(data_cadastro) = {$mes}";
	$resultado =  mysqli_query($conexao, $query);
		
	return mysqli_fetch_assoc($resultado);
}

function contadorPilhaPadraoTurmaMes($conexao, $turma, $mes){
	$query = "select count(padrao_cadastro) as total_padrao_turma from cadastro_pilha_padrao where padrao_cadastro = 'Padrão' AND turma_cadastro = '{$turma}' AND MONTH(data_cadastro) = {$mes}";
	$resultado =  mysqli_query($conexao, $query);
		
	return mysqli_fetch_assoc($resultado);
}

function contadorPilhaNaoPadraoTurmaMes($conexao, $turma, $mes){
	$query = "select count(padrao_cadastro) as total_nao_padrao_turma from cadastro_pilha_padrao where padrao_cadastro = 'Não Padrão' AND turma_cadastro = '{$turma}' AND MONTH(data_cadastro) = {$mes}";
	$resultado =  mysqli_query($conexao, $query);
		
	return mysqli_fetch_assoc($resultado);
}

function listaRelatorioMes($conexao, $mes){
	$query = "SELECT * FROM cadastro_pilha_padrao, equipamento, produto, pilha_padrao, periodo_chuvoso, usuario where cadastro_pilha_padrao.id_equipamento = equipamento.id_equipamento AND cadastro_pilha_padrao.material_cadastro = produto.id_produto AND cadastro_pilha_padrao.id_pilha_padrao = pilha_padrao.id_pilha_padrao AND cadastro_pilha_padrao.id_periodo_chuvoso = periodo_chuvoso.id_periodo_chuvoso AND cadastro_pilha_padrao.id_usuario = usuario.id_usuario AND MONTH(cadastro_pilha_padrao.data_cadastro) = {$mes} ORDER BY cadastro_pilha_padrao.data_cadastro" ;
	$resultado =  mysqli_query($conexao, $query);
	$pilhas = array();    
	   
	while($pilha = mysqli_fetch_assoc($resultado) ) {
		array_push($pilhas, $pilha);
	}
	return $pilhas;
  }