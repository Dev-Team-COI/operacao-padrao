<?php 	
 require_once("../php/conecta.php");
 require_once("../classes/Pilha.php");
 require_once("../classes/PilhaPadrao.php");
 require_once("../classes/CheckArea.php");
 require_once("../php/banco-pilha-padrao.php"); 
 require_once("../php/logica-usuario.php"); 

verificaUsuario();

$pilha = new Pilha();
$pilha->id_cadastro = $_POST['id_cadastro'];
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


if(isset($_POST['checkPadrao'])){
    $pilha->padrao_cadastro = "Padrão";
}else{
    $pilha->padrao_cadastro = "Não Padrão";
}


if( alteraPilhaPadrao($conexao, $pilha) ) { 

    $idCheck = listaCadastroIndividual($conexao, $_POST['id_cadastro']);

    $checkArea = new CheckArea();

    $checkArea->choveu = $_POST['radioChoveu'];
    $checkArea->agua_base = $_POST['radioAguaBase'];
    $checkArea->saldo_pilha = $_POST['radioSaldoPilha'];
    $checkArea->deslizamento = $_POST['radioDeslizamento'];

    alteraCheckArea($conexao,$checkArea, $idCheck['id_periodo_chuvoso']);

    $pilhaPadrao = new PilhaPadrao();

    $pilhaPadrao->angulo_empilhamento = isset($_POST['checkPilhaPadraoAngulo']) ? "true": "false";
    $pilhaPadrao->tipo_empilhamento = isset($_POST['checkPilhaPadraoTipo']) ? "true": "false";
    $pilhaPadrao->cabecao_empilhamento = isset($_POST['checkPilhaPadraoCabecao']) ? "true": "false";
    $pilhaPadrao->capacidade_empilhamento = isset($_POST['checkPilhaPadraoCapacidade']) ? "true": "false";
    $pilhaPadrao->espacamento_pilha = isset($_POST['checkPilhaPadraoEspacamento']) ? "true": "false";
    $pilhaPadrao->espacamento_berma = isset($_POST['checkPilhaPadraoBerma']) ? "true": "false";
    $pilhaPadrao->espacamento_via = isset($_POST['checkPilhaPadraoVia']) ? "true": "false";

    alteraCheckPilhaPadrao($conexao,$pilhaPadrao,$idCheck['id_pilha_padrao']);

    ?>
    <script type="text/javascript">
        alert("Pilha <?=$pilha->pilha_cadastro?> alterada com sucesso");
        window.location="../lista-pilha-padrao.php";
    </script>
<?php 

}
?>