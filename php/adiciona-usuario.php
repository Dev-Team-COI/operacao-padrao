<?php  		
 require_once("../php/conecta.php");
 require_once("../classes/Ausencia.php");
 require_once("../php/banco-ausencia.php"); 
require_once("../php/logica-usuario.php"); 



verificaUsuario();

$ausencia = new Ausencia();

$ausencia->id_matricula = $_POST['id_matricula'];
$ausencia->id_tipo = $_POST['id_tipo'];
$ausencia->inicio = $_POST['inicio'];
$ausencia->fim = $_POST['fim'];
$ausencia->obs = $_POST['obs'];

 insereAusencia($conexao, $ausencia);

 $_SESSION['success'] = 'Ausencia inserida com sucesso.';
 header("Location: ../operador.php");
 die();
 ?>
 