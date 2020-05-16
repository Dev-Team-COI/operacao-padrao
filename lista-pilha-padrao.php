<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("php/banco-usuario.php");
require_once("php/logica-usuario.php");
require_once("php/banco-equipamento.php");
require_once("php/banco-pilha-padrao.php");


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
            $(function() {
                $("#calendario").datepicker({
                    dateFormat: 'dd-mm-yy',
                    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
                    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
                    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
                });
            });
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
                            <li><a href="cadastro-pilha-padrao.php"><span class="fa fa-align-justify"></span> Cadastro</a></li>
                            <li class="active"><a href="lista-pilha-padrao.php"><span class="fa fa-download"></span>Pilhas Cadastradas</a></li> 
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
                    <!-- <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li>  -->
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
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Atualização de Pilha padrão</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">



                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Pilhas cadastradas no mês</h3>
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    <table class="table datatable_simple">
                                        <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th>Turno</th>
                                                <th>Turma</th>
                                                <th>Equipamento</th>
                                                <th>Pilha</th>
                                                <th>Status</th>
                                                <th>Editar</th>
                                                <th>Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $pilhas = listaCadastrosMes($conexao,date("m"));
                                            foreach($pilhas as $pilha) :
                                        ?>
                                            <tr>
                                                <td><?= date('d/m/y H:i', strtotime($pilha['data_cadastro']))?></td>
                                                <td><?= $pilha['turno_cadastro'] ?></td>
                                                <td><?= $pilha['turma_cadastro'] ?></td>
                                                <td><?= $pilha['tag_equipamento'] ?></td>
                                                <td><?= $pilha['pilha_cadastro'] ?></td>
                                                <td><?= $pilha['padrao_cadastro'] ?></td>
                                                <td >
                                                    <form action="atualiza-pilha-padrao.php" method="post">
                                                    
                                                        <input type="hidden" name="id_cadastro" value="<?php echo $pilha['id_cadastro']?>"/>
                                                        <input type="submit" name="button" value="Editar"/>
                                                    
                                                    </form>
                                                </td>
                                                <td >
                                                    <form id="idExcluiPilha" name="idExcluiPilha" onsubmit="return confirmacao(<?php echo $pilha['id_cadastro']?>); return false;" action="php/remove-pilha-padrao.php" method="post">
                                                        <input type="hidden" name="id_excluir" value="<?php echo $pilha['id_cadastro']?>">
                                                        <input type="hidden" name="name_pilha" value="<?php echo $pilha['pilha_cadastro']?>">
                                                        <input type="submit" value="Excluir" class="mb-control"  id="botao_enviar" class="btn-mini btn-danger"/>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                               endforeach
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                            <!-- END DEFAULT DATATABLE -->

                            <!-- onclick="document.getElementById('id').submit() -->
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
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Remover Pilha <strong>***</strong> ?</div>
                    <div class="mb-content">
                        <p>Deseja realmente excluir pilha do relatório?</p>                    
                        <p><strong>Sim</strong> para remover, <strong>Não</strong> para retornar à lista!</p>
                    </div> 
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="#" id="btnDelete"class="btn btn-success btn-lg">Sim</a>
                            <button class="btn btn-default btn-lg mb-control-close" onclick="closeDialog ();">Não</button>
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
        
        <script type="text/javascript" src="js/plugins/jquery/jquery-3.5.0.js"></script>
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
        <script src="https://code.jquery.com/jquery-3.5.0.js"></script> 
        

        <script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>   

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

    <!-- <script>
            $(document).ready(function(){
                $("#botao_enviar").click(function(){

                    var str = $("#id_excluir").val();
                    alert(str);
                });
            });

    </script> -->

    <script>
        function confirmacao(id){
            //var x;
            //var id = ide;
            var r = confirm("Deseja realmente excluir registro ?");
            if (r==true){
                x="você pressionou OK!";
                //$("#id_excluir").val(ide);
                return true;
                //$("#idExcluiPilha").submit();
                //window.location='php/remove-pilha-padrao.php?id='+id;
            }else{
                x="Você pressionou Cancelar!";
                //window.location='lista-pilha-padrao.php';
                return false;
            }
            //document.getElementById("demo").innerHTML=x;
            
        }
    </script>


    <script>
    //CARREGA VALOR DO ID PARA EXCLUSÃO
    $(document).ready(function(){
        $("input[name$='btnDelete']").click(function(){ // Click to only happen on announce links
            alert("entrei");
            //$("#cafeId").val($(this).data('id_excluir'));
            //var id = button.data('id_excluir'); //recuperando id
            //$("#retorno").load("php/remove-pilha-padrao.php", {id:id});
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



