<?php
session_start();
function usuarioEstaLogado() {
	return isset($_SESSION["usuario_logado"]);
}
 
function verificaUsuario() {
  if(!usuarioEstaLogado()) {
  	 $_SESSION["danger"] = "Você nãos tem permissão para acessar esta página !";
     header("Location: ../index.php");
     die();
  }
}

function idUsuario($idUsuario){
  $_SESSION['id_usuario'] = $idUsuario;
}

function idLogado(){
 return $_SESSION['id_usuario'];    
}

function logaUsuario($usuarioNome) {
  $_SESSION["usuario_logado"] = $usuarioNome;
}

function usuarioLogado() {
    return $_SESSION["usuario_logado"];
}

function idMatricula($idMatricula){
  $_SESSION['id_matricula'] = $idMatricula;
}

function matriculaLogada(){
 return $_SESSION['id_matricula'];    
}

function idPerfil($idPerfil){
  $_SESSION['id_perfil'] = $idPerfil;
}

function perfilLogado(){
 return $_SESSION['id_perfil'];    
}

function logout() {
  session_destroy();
  session_start();
  $_SESSION["success"] = "Logout realizado com sucesso"; 
}


