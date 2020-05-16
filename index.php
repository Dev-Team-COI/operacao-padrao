<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("php/banco-usuario.php");
require_once("php/logica-usuario.php");
require_once("php/login.php");

//$ip = getenv ("REMOTE_ADDR"); // obtém o número ip do usuário
//$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//$command = exec('wmic /node:"'.$hostname.'" computersystem get username', $displayInfo);
//$arrayInfo = explode("\\",$displayInfo[1]);

//echo "Domínio: ".$dominio = $display[0];
//echo "<br>Usuário: ".$user = $display[1];
$operadorLogado = "477953";

$usuario = conexaoMenu($conexao, $operadorLogado);

verificaUsuario();

//$nomeFuncao = buscaFuncao($conexao, MatriculaLogado());

?>







