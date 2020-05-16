<?php

require_once("conecta.php");			

function buscaUsuario($conexao, $matricula, $senha) {
    //$senhaMd5 = md5($senha);
   
    $query = "select * from usuario where matricula_usuario ='{$matricula}' and senhaAdmin = '{$senha}'";

    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

function buscaLoginOperador($conexao, $matricula) {
    //$senhaMd5 = md5($senha);
   
    $query = "select * from usuario where matricula_usuario ='{$matricula}'";

    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}

/*function buscaFuncao($conexao, $matricula) {
   
    $query = "select * from funcao, usuario where usuario.idFuncao = funcao.idFuncao and matriculaUsuario ='{$matricula}'";

    $resultado = mysqli_query($conexao, $query);
    $funcao = mysqli_fetch_assoc($resultado);
    return $funcao;
}*/

function listaUsuarioFuncao($conexao, $funcao, $supervisao) {
	$operadores = array();
    
	$query = "select p.matriculaUsuario as matricula_usuario, p.nomeUsuario as nome_usuario, c.*, d.* from usuario as p join supervisao as c join funcao as d on p.idSupervisao = c.idSupervisao and p.idFuncao = d.idFuncao and p.idFuncao = {$funcao} and p.idSupervisao = 1 order by p.nomeUsuario";
    
	$resultado = mysqli_query($conexao, $query);
	while($operador = mysqli_fetch_assoc($resultado)) {
		array_push($operadores, $operador);
	}
	return $operadores;
}

function lista($conexao) {
	$empilhadeiras = array();
    
	$query = "select * from estrutura where tipo = 'Empilhadeira' order by estrutura";
    
	$resultado = mysqli_query($conexao, $query);
	while($empilhadeira = mysqli_fetch_assoc($resultado)) {
		array_push($empilhadeiras, $empilhadeira);
	}
	return $empilhadeiras;
}

function insereUsuarioCCQ($conexao, $usuario){
     $query = "insert into usuario (matriculaUsuario, nomeUsuario, idFuncao, senhaUsuario) values ('{$usuario->matriculaUsuario}','{$usuario->nomeUsuario}',1,MD5('matriculaUsuario'))";
     return mysqli_query($conexao, $query);
}

function usuario($conexao, $matricula){
    
  $query = "select * from usuario where matricula='{$matricula}'";  
      
  $resultado =  mysqli_query($conexao, $query);
  $usuarios = array();    
     
  while($usuario = mysqli_fetch_assoc($resultado) ) {
      array_push($usuarios, $usuario);
  }
  return $usuarios;
}

function alteraSenha($conexao, $usuario, $senhaAtual) {
      $query = "update usuario set senha = MD5('{$usuario->senha}') where matricula ='{$usuario->matricula}' and senha = '{$senhaAtual}'" ; 
       
      return mysqli_query($conexao, $query);
}