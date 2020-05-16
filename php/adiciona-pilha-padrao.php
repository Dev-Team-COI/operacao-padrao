<?php  		
 require_once("../php/conecta.php");
 require_once("../classes/Pilha.php");
 require_once("../classes/PilhaPadrao.php");
 require_once("../classes/CheckArea.php");
 require_once("../php/banco-pilha-padrao.php"); 
 require_once("../php/logica-usuario.php"); 

//date_default_timezone_set(‘America/Sao_Paulo’);

verificaUsuario();

$pilha = new Pilha();
      
$pilha->turno_cadastro = $_POST['turno'];
$pilha->turma_cadastro = $_POST['turma'];
$pilha->pilha_cadastro = strtoupper($_POST['pilha']);
$pilha->material_cadastro = $_POST['produto'];
$pilha->data_cadastro = date('Y-m-d H:i:s', strtotime($_POST['dataCadastro']. " ".$_POST['horaCadastro']));
$pilha->balizamento_cadastro = $_POST['balizaInicial']."x".$_POST['balizaFinal'];
$pilha->tipoempilhamento_cadastro = $_POST['tipo'];
$pilha->lotes_cadastro = $_POST['quantidadeLotes'];
$pilha->obs_cadastro = strtoupper($_POST['observacao']);
$pilha->id_usuario = idLogado();
$pilha->atualizacao_cadastro = date('Y-m-d H:i');
$pilha->id_equipamento = $_POST['equipamento'];

  // cadastro de tabela pilha padrao -- true -> não padrão.
  if(isset($_POST['checkPadrao'])){
    
        $pilha->padrao_cadastro = "Padrão";

  }else{

    $pilha->padrao_cadastro = "Não Padrão";

  }
  
  $pilhaPadrao = new PilhaPadrao();
  //------------------------------------------------------------------------------------------
  //Inserção de registro na tabela de check de pilha padrão.
  //------------------------------------------------------------------------------------------
  $pilhaPadrao->angulo_empilhamento = isset($_POST['checkPilhaPadraoAngulo']) ? "true": "false";
  $pilhaPadrao->tipo_empilhamento = isset($_POST['checkPilhaPadraoTipo']) ? "true": "false";
  $pilhaPadrao->cabecao_empilhamento = isset($_POST['checkPilhaPadraoCabecao']) ? "true": "false";
  $pilhaPadrao->capacidade_empilhamento = isset($_POST['checkPilhaPadraoCapacidade']) ? "true": "false";
  $pilhaPadrao->espacamento_pilha = isset($_POST['checkPilhaPadraoEspacamento']) ? "true": "false";
  $pilhaPadrao->espacamento_berma = isset($_POST['checkPilhaPadraoBerma']) ? "true": "false";
  $pilhaPadrao->espacamento_via = isset($_POST['checkPilhaPadraoVia']) ? "true": "false";
  insereCheckPilhaPadrao($conexao,$pilhaPadrao);
  //------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------

  $checkArea = new CheckArea();
  //------------------------------------------------------------------------------------------
  //Inserção de registro na tabela de check de área.
  //------------------------------------------------------------------------------------------
  $checkArea->choveu = $_POST['radioChoveu'];
  $checkArea->agua_base = $_POST['radioAguaBase'];
  $checkArea->saldo_pilha = $_POST['radioSaldoPilha'];
  $checkArea->deslizamento = $_POST['radioDeslizamento'];
  insereCheckArea($conexao,$checkArea);
  //------------------------------------------------------------------------------------------
  //------------------------------------------------------------------------------------------


  $pilha->id_pilha_padrao = ultimoRegistroPilhaPadrao($conexao);
  $pilha->id_periodo_chuvoso = ultimoRegistroCheckArea($conexao);

  $p = strtoupper($_POST['pilha']);

if(inserePilhaPadrao($conexao, $pilha)){
  

  echo "<script>alert('Pilha cadastrada '+'$p' +' com sucesso');</script>";
  echo "<script>window.location='../cadastro-pilha-padrao.php';</script>";

}

 //$_SESSION['success'] = 'Pilha padrão cadastrada com sucesso.';
 //header("Location: ../cadastro-pilha-padrao.php");
 //die();
 ?>
 