<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("php/banco-usuario.php");
require_once("php/logica-usuario.php");
require_once("php/banco-equipamento.php");


verificaUsuario();


$listaEquipamento = listaEquipamentoDescarregamento($conexao);
$listaProdutos = listaProduto($conexao);
//$ultimoRegistro = ultimoRegistroPilhaPadrao($conexao);
$hoje = date("m/d/Y");
//$nomeFuncao = buscaFuncao($conexao, MatriculaLogado());
//$listaUsuarios = listaUsuarioFuncao($conexao, FuncaoLogada(),SupervisaoLogada());
//$listaComponentes = listaComponenteEmpilhadeira($conexao);
//$listaStatus = listaStatus($conexao);
//$listaMinerais = listaMineral($conexao);
    
?>
         <!-- <script type="text/javascript">
             
                  alert("Valor = <?= $ultimoRegistro ?>");
         </script> -->
        <?php

?>

<html lang="pt-br">
    <head>        
        <!-- META SECTION -->
        <title>Cadastro de Pilha Padrão</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Language" content="pt-br" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
                        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->    
        <link rel="stylesheet" href="css/jquery/jquery-ui.css" />
        <script src="js/plugins/jquery/jquery-1.8.2.js"></script>
        <script src="js/plugins/jquery/jquery-ui.js"></script>
        <script src="js/plugins/fullcadendar/lang/pt-br.js"></script>


        <script>
            $(function(){
                $("#datacalendario").datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'
                        ],
                    dayNamesMin: [
                    'D','S','T','Q','Q','S','S','D'
                    ],
                    dayNamesShort: [
                    'Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
                    ],
                    monthNames: [  'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
                    'Outubro','Novembro','Dezembro'
                    ],
                    monthNamesShort: [
                    'Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
                    'Out','Nov','Dez'
                    ],
                    nextText: 'Próximo',
                    prevText: 'Anterior'
                    });
                });

            $( ".datacalendario" ).datepicker({
                dateFormat: "dd/mm/yy"
            });

            // Getter
            var dateFormat = $( ".datacalendario" ).datepicker( "option", "dateFormat" );
            
            // Setter
            $( ".datacalendario" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
            </script>


    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                 <?php require_once("menu-perfil.php"); ?>
                
                     <li>
                        <a href="inicio.php"><span class="fa fa-desktop"></span> <span class="xn-text">Inicial</span></a>                        
                    </li>    
    
                    <li class="xn-openable active">
                        <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Pilha Padrão</span></a>
                        <ul>                            
                            <li class="active"><a href="cadastro-pilha-padrao.php"><span class="fa fa-align-justify"></span> Cadastro</a></li>
                            <li><a href="lista-pilha-padrao.php"><span class="fa fa-download"></span>Pilhas Cadastradas</a></li> 
                            <li><a href="#"><span class="fa fa-download"></span>Relatórios</a></li> 
                            <!-- <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span>Pilha Padrão</a></li> -->
                                                       
                        </ul>
                    </li>                  
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH 
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>-->   
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                   
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Cadastro</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Cadastro Pilha Padrão</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

            <!-- START DEFAULT FORM ELEMENTS -->
            <div class="block">
                <form class="form-horizontal" role="form" >  

                    <div class="row">
                
                    
                    </div>
                    </form>
              

                     <div class="row">
                        <div class="col-md-12">
                            
                            <form id="jvalidate" role="form" class="form-horizontal" action="php/adiciona-pilha-padrao.php" method="post">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Informações da Pilha</h3>
                                        <ul class="panel-controls">
                                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="panel-body">                                                                        
                                        
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Matrícula</label>
                                                    <div class="col-md-3">                                            
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="<?= matriculaLogada() ?>" disabled="disabled"/>
                                                        </div>                                            
                                                    </div>

                                                    <label class="col-md-1 control-label">Turno</label>
                                                    <div class="col-md-2">                                                                                            
                                                        <select name="turno" class="form-control select">
                                                            <option></option>
                                                            <option value="07x19">07x19</option>
                                                            <option value="19x07">19x07</option>
                                                        </select>
                                                    </div>

                                                    <label class="col-md-1 control-label">Turma</label>
                                                    <div class="col-md-2">                                                                                            
                                                        <select name="turma" class="form-control select">
                                                            <option></option>
                                                            <option value="A">A</option>
                                                            <option value="B">B</option>
                                                            <option value="C">C</option>
                                                            <option value="D">D</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Operador</label>
                                                    <div class="col-md-9">                                            
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                            <input type="text" class="form-control" value="<?= usuarioLogado() ?>" disabled="disabled" />
                                                        </div>                                            
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">                                        
                                                    <label class="col-md-2 control-label">Data</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <input type="text" name="dataCadastro" id="datacalendario" value="<?= $hoje ?>" class="form-control" />
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        </div>              
                                                    </div>

                                                    <label class="col-md-2   control-label">Hora</label>
                                                    <div class="col-md-3 col-xs-12">
                                                        <div class="input-group">
                                                            <input type="text" name="horaCadastro" class="form-control timepicker24"/>
                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                        </div>              
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Equipamento</label>
                                                    <div class="col-md-4">                                                                                            
                                                        <select name="equipamento" class="form-control select">
                                                            <option></option>
                                                            <?php foreach($listaEquipamento as $equipamento) : 
                                                    
                                                                $selecao = $esseEhOEquipamento ? "selected='selected'" : ""; ?>
                                                            
                                                                <option value="<?=$equipamento['id_equipamento']?>" <?=$selecao?>><?=$equipamento['tag_equipamento']?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>

                                                    <label class="col-md-1 control-label">Tipo</label>
                                                    <div class="col-md-4">                                                                                            
                                                        <select name="tipo" class="form-control select">
                                                            <option></option>
                                                            <option>Chevron</option>
                                                            <option>Conevron</option>
                                                            <option>Multichevron</option>
                                                            <option>Windrow Modificado</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Pilha</label>
                                                    <div class="col-md-4">
                                                        <input type="text" name="pilha" style="text-transform: uppercase;"  class="form-control" placeholder="B100"/>
                                                    </div>

                                                    <label class="col-md-2 control-label">Produto</label>
                                                    <div class="col-md-3">                                                                                            
                                                        <select name="produto" class="form-control select">
                                                            <option></option>
                                                            <?php foreach($listaProdutos as $produto) : 
                                                                
                                                                $selecao = $esseEhOProduto? "selected='selected'" : ""; ?>
                                                            
                                                                <option value="<?=$produto['id_produto']?>" <?=$selecao?>><?=$produto['nome_produto']?>
                                                            </option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Balizamento</label>
                                                    <div class="col-md-2">
                                                        <input type="number" name="balizaInicial" class="form-control" placeholder="Incial"/>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="number" name="balizaFinal" class="form-control" placeholder="Final"/>
                                                    </div>

                                                    <label class="col-md-2 control-label">Quantidade de lotes</label>
                                                    <div class="col-md-3">
                                                        <input type="number" name="quantidadeLotes" class="form-control" placeholder=""/>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Observação</label>
                                                    <div class="col-md-9 col-xs-12">                                            
                                                        <textarea class="form-control" name="observacao" style="text-transform: uppercase;" rows="5"></textarea>
                                                        <span class="help-block">Descreva Observações de formação da pilha</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Arquivo</label>
                                                    <div class="col-md-9">                                                                                                                                        
                                                        <input type="file" class="fileinput btn-primary" name="filename" id="filename" title="Anexo"/>
                                                        <span class="help-block">Anexe um arquivo ou imagem *** esta função ainda não está ativada...</span>
                                                    </div>
                                                </div>
                                            
                                            </div>
                                            <div class="col-md-6">
                                                    <h3>Check de Área</h3>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Choveu?</label>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioChoveu" value="true" class="icheckbox"/> Sim</label>
                                                        </div>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioChoveu" value="false" class="icheckbox" checked="checked"/> Não</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Água na Base?</label>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioAguaBase" value="true" class="icheckbox"/> Sim</label>
                                                        </div>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioAguaBase" value="false" class="icheckbox" checked="checked"/> Não</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Saldo na Pilha?</label>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioSaldoPilha" value="true" class="icheckbox"/> Sim</label>
                                                        </div>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioSaldoPilha" value="false" class="icheckbox" checked="checked"/> Não</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Houve Deslizamento?</label>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioDeslizamento" value="true" class="icheckbox"/> Sim</label>
                                                        </div>
                                                        <div class="col-md-2">                                                                                                                                        
                                                            <label class="check"><input type="radio" name="radioDeslizamento" value="false" class="icheckbox" checked="checked"/> Não</label>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    
                                                    <h3>Pilha Padrão ?</h3>
                                                    <div class="form-group">     
                                                        <label id="nomePadrao" class="col-md-3 control-label">Não Padrão</label>       
                                                        <label class="switch">
                                                            <input type="checkbox" id="teste1" name="checkPadrao" value="true"/>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                        <div id="formulario" >
                                                            <h4>Não Conformidade</h4>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Ângulo</label>
                                                                <div class="col-md-1">                                                                                                                                        
                                                                    <label class="check"><input id="checkAngulo" type="checkbox" name="checkPilhaPadraoAngulo" class="icheckbox"/></label>
                                                                </div>
                                                                <label class="col-md-2 control-label">Tipo</label>
                                                                <div class="col-md-1">                                                                                                                                        
                                                                    <label class="check"><input id="checkTipo" type="checkbox" name="checkPilhaPadraoTipo" class="icheckbox"/></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Cabeção/Barriga</label>
                                                                <div class="col-md-1">                                                                                                                                        
                                                                    <label class="check"><input id="checkCabecao" type="checkbox" name="checkPilhaPadraoCabecao" class="icheckbox"/></label>
                                                                </div>
                                                                <label class="col-md-2 control-label">Capacidade</label>
                                                                <div class="col-md-1">                                                                                                                                        
                                                                    <label class="check"><input id="checkCapacidade" type="checkbox" name="checkPilhaPadraoCapacidade" class="icheckbox"/></label>
                                                                </div>
                                                            </div>
                                                            
                                                            <h5>Espaçamento entre:</h5>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Pilha</label>
                                                                <div class="col-md-1">                                                                                                                                        
                                                                    <label class="check"><input id="checkPilha" type="checkbox" name="checkPilhaPadraoEspacamento" class="icheckbox"/></label>
                                                                </div>
                                                                <label class="col-md-2 control-label">Berma</label>
                                                                <div class="col-md-1">                                                                                                                                        
                                                                    <label class="check"><input id="checkBerma" type="checkbox" name="checkPilhaPadraoBerma" class="icheckbox"/></label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Vias de Acesso</label>
                                                                <div class="col-md-1">                                                                                                                                        
                                                                    <label class="check"><input id="checkVia" type="checkbox" name="checkPilhaPadraoVia" class="icheckbox"/></label>
                                                                </div>
                                                            </div> 
                                                        </div>                                           
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary pull-right">Cadastrar</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        </div> 

                            
                            <!-- END FORM GROUP ELEMENTS -->
                            
                        </div>

                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->             
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
        <!-- END PLUGINS -->
        
        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type='text/javascript' src='js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='js/plugins/validationengine/jquery.validationEngine.js'></script>        

        <script type='text/javascript' src='js/plugins/jquery-validation/jquery.validate.js'></script>                
        <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput.min.js'></script>
        
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

        <!-- END THIS PAGE PLUGINS -->       
        
        <!-- START TEMPLATE -->
        <!-- <script type="text/javascript" src="js/settings.js"></script> -->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->       

    <script>
       //FUNCAO PARA ESCONDER E APRESENTAR CAMPOS
       $(document).ready(function(){
            $("input[name$='checkPadrao']").click(function(){
                var test = $(this).val();
            
                if(test == "true"){
                    $("#formulario").hide(200);
                    $("#nomePadrao").html("Padrão");
                    $(this).val("false");
                }else{
                    $("#formulario").show(200);
                    $("#nomePadrao").html("Não Padrão");
                    $(this).val("true");
                }
         
            });
        });
    </script>
    
    <script type="text/javascript">
            var jvalidate = $("#jvalidate").validate({
                ignore: [],
                rules: {                                            
                        turno: {
                                required: true
                        },
                        turma: {
                                required: true
                        },
                        dataCadastro: {
                                required: true,
                                date: true
                        },
                        horaCadastro: {
                                required: true
                        },
                        equipamento: {
                                required: true
                        },
                        tipo: {
                                required: true
                        },
                        pilha: {
                                required: true
                        },
                        produto: {
                                required: true
                        },
                        balizaInicial: {
                                required: true
                        },
                        balizaFinal: {
                                required: true
                        },
                        balizaFinal: {
                                required: true
                        },
                        quantidadeLotes: {
                                required: true
                        },
                

                    }                                        
                });                                    

        </script>
    </body>
</html>








