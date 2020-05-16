<!DOCTYPE html>
<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once("php/banco-pilha-padrao.php");
require_once("php/logica-usuario.php");
require_once("php/login.php");

//$ip = getenv ("REMOTE_ADDR"); // obtém o número ip do usuário
//$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//$command = exec('wmic /node:"'.$hostname.'" computersystem get username', $displayInfo);
//$arrayInfo = explode("\\",$displayInfo[1]);

//echo "Domínio: ".$dominio = $display[0];
//echo "<br>Usuário: ".$user = $display[1];

$total = contadorPilhas($conexao, date("m"));

?>


<html lang="pt">
    <head>        
        <!-- META SECTION -->
        <title>Operação Padrão</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="pages-login.php" >Operação</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                        <img src="assets/images/machines/ep.jpg" alt="Empilhadeiras"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                            <img src="assets/images/machines/ep.jpg" alt="Empilhadeiras"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name"><?= usuarioLogado() ?></div> 
                                <div class="profile-data-title"></div>
                            </div>
                           
                        </div>                                                                        
                    </li>
                    <li class="xn-title">Bem vindo ao Operação Padrão</li>
                    <!-- <li class="active">
                        <a href="captura.php"><span class="fa fa-desktop"></span> <span class="xn-text">Captura de Demanda</span></a>                        
                    </li>                   -->
                    <!--<li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>
                        <ul>
                            <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Gallery</a></li>
                            <li><a href="pages-profile.html"><span class="fa fa-user"></span> Profile</a></li>
                            <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Address Book</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                                <ul>
                                    <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                                    <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                                <ul>
                                    <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>
                                    <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
                                    <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>
                                </ul>
                            </li>
                            <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li>
                            <li><a href="pages-calendar.html"><span class="fa fa-calendar"></span> Calendar</a></li>
                            <li><a href="pages-tasks.html"><span class="fa fa-edit"></span> Tasks</a></li>
                            <li><a href="pages-content-table.html"><span class="fa fa-columns"></span> Content Table</a></li>
                            <li><a href="pages-faq.html"><span class="fa fa-question-circle"></span> FAQ</a></li>
                            <li><a href="pages-search.html"><span class="fa fa-search"></span> Search</a></li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-file"></span> Blog</a>
                                
                                <ul>                                    
                                    <li><a href="pages-blog-list.html"><span class="fa fa-copy"></span> List of Posts</a></li>
                                    <li><a href="pages-blog-post.html"><span class="fa fa-file-o"></span>Single Post</a></li>
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-sign-in"></span> Login</a>
                                <ul>                                    
                                    <li><a href="pages-login.html">App Login</a></li>
                                    <li><a href="pages-login-website.html">Website Login</a></li>
                                    <li><a href="pages-login-website-light.html"> Website Login Light</a></li>
                                </ul>
                            </li>
                            <li class="xn-openable">
                                <a href="#"><span class="fa fa-warning"></span> Error Pages</a>
                                <ul>                                    
                                    <li><a href="pages-error-404.html">Error 404 Sample 1</a></li>
                                    <li><a href="pages-error-404-2.html">Error 404 Sample 2</a></li>
                                    <li><a href="pages-error-500.html"> Error 500</a></li>
                                </ul>
                            </li>                            
                        </ul>
                    </li> -->
                    <!--<li class="xn-openable">
                        <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Layouts</span></a>
                        <ul>
                            <li><a href="layout-boxed.html">Boxed</a></li>
                            <li><a href="layout-nav-toggled.html">Navigation Toggled</a></li>
                            <li><a href="layout-nav-top.html">Navigation Top</a></li>
                            <li><a href="layout-nav-right.html">Navigation Right</a></li>
                            <li><a href="layout-nav-top-fixed.html">Top Navigation Fixed</a></li>                            
                            <li><a href="layout-nav-custom.html">Custom Navigation</a></li>
                            <li><a href="layout-frame-left.html">Frame Left Column</a></li>
                            <li><a href="layout-frame-right.html">Frame Right Column</a></li>
                            <li><a href="layout-search-left.html">Search Left Side</a></li>
                            <li><a href="blank.html">Blank Page</a></li>
                        </ul>
                    </li>-->
                   <!-- <li class="xn-title">Components</li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">UI Kits</span></a>                        
                        <ul>
                            <li><a href="ui-widgets.html"><span class="fa fa-heart"></span> Widgets</a></li>                            
                            <li><a href="ui-elements.html"><span class="fa fa-cogs"></span> Elements</a></li>
                            <li><a href="ui-buttons.html"><span class="fa fa-square-o"></span> Buttons</a></li>                            
                            <li><a href="ui-panels.html"><span class="fa fa-pencil-square-o"></span> Panels</a></li>
                            <li><a href="ui-icons.html"><span class="fa fa-magic"></span> Icons</a><div class="informer informer-warning">+679</div></li>
                            <li><a href="ui-typography.html"><span class="fa fa-pencil"></span> Typography</a></li>
                            <li><a href="ui-portlet.html"><span class="fa fa-th"></span> Portlet</a></li>
                            <li><a href="ui-sliders.html"><span class="fa fa-arrows-h"></span> Sliders</a></li>
                            <li><a href="ui-alerts-popups.html"><span class="fa fa-warning"></span> Alerts & Popups</a></li>                            
                            <li><a href="ui-lists.html"><span class="fa fa-list-ul"></span> Lists</a></li>
                            <li><a href="ui-tour.html"><span class="fa fa-random"></span> Tour</a></li>
                        </ul>
                    </li>-->                    
                  <!--  <li class="xn-openable">
                        <a href="#"><span class="fa fa-pencil"></span> <span class="xn-text">Forms</span></a>
                        <ul>
                            <li>
                                <a href="form-layouts-two-column.html"><span class="fa fa-tasks"></span> Form Layouts</a>
                                <div class="informer informer-danger">New</div>
                                <ul>
                                    <li><a href="form-layouts-one-column.html"><span class="fa fa-align-justify"></span> One Column</a></li>
                                    <li><a href="form-layouts-two-column.html"><span class="fa fa-th-large"></span> Two Column</a></li>
                                    <li><a href="form-layouts-tabbed.html"><span class="fa fa-table"></span> Tabbed</a></li>
                                    <li><a href="form-layouts-separated.html"><span class="fa fa-th-list"></span> Separated Rows</a></li>
                                </ul> 
                            </li>
                            <li><a href="form-elements.html"><span class="fa fa-file-text-o"></span> Elements</a></li>
                            <li><a href="form-validation.html"><span class="fa fa-list-alt"></span> Validation</a></li>
                            <li><a href="form-wizards.html"><span class="fa fa-arrow-right"></span> Wizards</a></li>
                            <li><a href="form-editors.html"><span class="fa fa-text-width"></span> WYSIWYG Editors</a></li>
                            <li><a href="form-file-handling.html"><span class="fa fa-floppy-o"></span> File Handling</a></li>
                        </ul>
                    </li>-->  
                   <!-- <li class="xn-openable">
                        <a href="tables.html"><span class="fa fa-table"></span> <span class="xn-text">Tables</span></a>
                        <ul>                            
                            <li><a href="table-basic.html"><span class="fa fa-align-justify"></span> Basic</a></li>
                            <li><a href="table-datatables.html"><span class="fa fa-sort-alpha-desc"></span> Data Tables</a></li>
                            <li><a href="table-export.html"><span class="fa fa-download"></span> Export Tables</a></li>                            
                        </ul>
                    </li> --> 
                    <!--<li class="xn-openable">
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Charts</span></a>
                        <ul>
                            <li><a href="charts-morris.html"><span class="xn-text">Morris</span></a></li>
                            <li><a href="charts-nvd3.html"><span class="xn-text">NVD3</span></a></li>
                            <li><a href="charts-rickshaw.html"><span class="xn-text">Rickshaw</span></a></li>
                            <li><a href="charts-other.html"><span class="xn-text">Other</span></a></li>
                        </ul>
                    </li>  -->                  
                    <!--<li>
                        <a href="maps.html"><span class="fa fa-map-marker"></span> <span class="xn-text">Maps</span></a>
                    </li> -->                   
                    <!--<li class="xn-openable">
                        <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Navigation Levels</span></a>
                        <ul>                            
                            <li class="xn-openable">
                                <a href="#">Second Level</a>
                                <ul>
                                    <li class="xn-openable">
                                        <a href="#">Third Level</a>
                                        <ul>
                                            <li class="xn-openable">
                                                <a href="#">Fourth Level</a>
                                                <ul>
                                                    <li><a href="#">Fifth Level</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    
                </ul>-->
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
                    <!-- SEARCH -->
                   <!-- <li class="xn-search">
                        <form role="form">
                          <input type="text" name="search" placeholder="Search..."/> 
                        </form>
                    </li> --> 
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a><span>Login</span></a>
                        <a href="pages-login.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-in"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    <!-- MESSAGES 
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-comments"></span></a>
                        <div class="informer informer-danger">4</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-comments"></span> Messages</h3>                                
                                <div class="pull-right">
                                    <span class="label label-danger">4 new</span>
                                </div>
                            </div>
                            <div class="panel-body list-group list-group-contacts scroll" style="height: 200px;">
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-online"></div>
                                    <img src="assets/images/users/user2.jpg" class="pull-left" alt="John Doe"/>
                                    <span class="contacts-title">John Doe</span>
                                    <p>Praesent placerat tellus id augue condimentum</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user.jpg" class="pull-left" alt="Dmitry Ivaniuk"/>
                                    <span class="contacts-title">Dmitry Ivaniuk</span>
                                    <p>Donec risus sapien, sagittis et magna quis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-away"></div>
                                    <img src="assets/images/users/user3.jpg" class="pull-left" alt="Nadia Ali"/>
                                    <span class="contacts-title">Nadia Ali</span>
                                    <p>Mauris vel eros ut nunc rhoncus cursus sed</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <div class="list-group-status status-offline"></div>
                                    <img src="assets/images/users/user6.jpg" class="pull-left" alt="Darth Vader"/>
                                    <span class="contacts-title">Darth Vader</span>
                                    <p>I want my money back!</p>
                                </a>
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-messages.html">Show all messages</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END MESSAGES -->
                    <!-- TASKS 
                    <li class="xn-icon-button pull-right">
                        <a href="#"><span class="fa fa-tasks"></span></a>
                        <div class="informer informer-warning">3</div>
                        <div class="panel panel-primary animated zoomIn xn-drop-left xn-panel-dragging">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="fa fa-tasks"></span> Tasks</h3>                                
                                <div class="pull-right">
                                    <span class="label label-warning">3 active</span>
                                </div>
                            </div>
                            <div class="panel-body list-group scroll" style="height: 200px;">                                
                                <a class="list-group-item" href="#">
                                    <strong>Phasellus augue arcu, elementum</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 25 Sep 2014 / 50%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Aenean ac cursus</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                    </div>
                                    <small class="text-muted">Dmitry Ivaniuk, 24 Sep 2014 / 80%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Lorem ipsum dolor</strong>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">95%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 23 Sep 2014 / 95%</small>
                                </a>
                                <a class="list-group-item" href="#">
                                    <strong>Cras suscipit ac quam at tincidunt.</strong>
                                    <div class="progress progress-small">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                    <small class="text-muted">John Doe, 21 Sep 2014 /</small><small class="text-success"> Done</small>
                                </a>                                
                            </div>     
                            <div class="panel-footer text-center">
                                <a href="pages-tasks.html">Show all tasks</a>
                            </div>                            
                        </div>                        
                    </li>
                    <!-- END TASKS -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Página Inicial</a></li>                    
                   <!-- <li class="active">Dashboard</li>-->
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
                    <!-- START WIDGETS -->                    
                    <div class="row">
                    <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href='cadastro-pilha-padrao.php';">
                                <div class="widget-item-left">
                                    <span class="fa fa-chevron-up"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $total['total']?></div>
                                    <div class="widget-title">Pilhas cadastradas no mês</div>
                                    <div class="widget-subtitle">Clique aqui para cadastrar</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>

                        <div class="col-md-3">
                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">Usuário Logado</div>                                                                        
                                        <div class="widget-subtitle"><?= usuarioLogado() ?></div>
                                        <div class="widget-int">**</div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Turma</div>
                                        <div class="widget-subtitle">**</div>
                                        <div class="widget-int">***</div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Outros</div>
                                        <div class="widget-subtitle">***</div>
                                        <div class="widget-int">***</div>
                                    </div>
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>         
                            <!-- END WIDGET SLIDER -->
                            
                        </div>

                        
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                    <form id="formulario_execel" name="formulario_execel" action="php/excel.php" method="post">
                                        <div class="widget-data">
                                            <div class="widget-title">Relatório</div>
                                            <div class="widget-subtitle">Mês</div>
                                                    <div lass="widget-subtitle">                                                                                            
                                                        <select name="mes">
                                                            <option></option>
                                                            <option value="1">Jan</option>
                                                            <option value="2">Fev</option>
                                                            <option value="3">Mar</option>
                                                            <option value="4">Abr</option>
                                                            <option value="5">Mai</option>
                                                            <option value="6">Jun</option>
                                                            <option value="7">Jul</option>
                                                            <option value="8">Ago</option>
                                                            <option value="9">Set</option>
                                                            <option value="10">Out</option>
                                                            <option value="11">Nov</option>
                                                            <option value="12">Dez</option>
                                                        </select>
                                                    </div>
                                                <div class="btn-group pull-right">
                                                <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>Exportar</button>
                                                
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" onclick="document.getElementById('formulario_execel').submit();"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                                        <li><a href="#"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                                    </ul>
                                                               
                                                    <!-- onclick="document.getElementById('formulario_execel').submit();" -->
                                    </form>



                                        </div>   
                                    </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                    
                    <div class="row">
                        <div class="col-md-4">
                            
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Total de Pilhas</h3>
                                        <span>Pilha padrão Mensal</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                            
                        </div>

                        <div class="col-md-4">
                            
                            <!-- START USERS ACTIVITY BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Total por turma</h3>
                                        <span>Pilha padrão Mensal por turma</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-turma" style="height: 200px;"></div>
                                </div>                                    
                            </div>
                            <!-- END USERS ACTIVITY BLOCK -->
                            
                        </div>

                        <div class="col-md-4">
                            
                            <!-- START VISITORS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Mensal geral</h3>
                                        <span>Percentual geral</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
                                </div>
                            </div>
                            <!-- END VISITORS BLOCK -->
                            
                        </div>

						
                            
                            <!-- START PROJECTS BLOCK -->
                            <!-- <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Projects</h3>
                                        <span>Projects activity</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="50%">Project</th>
                                                    <th width="20%">Status</th>
                                                    <th width="30%">Activity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>Joli Admin</strong></td>
                                                    <td><span class="label label-danger">Developing</span></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active">
                                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gemini</strong></td>
                                                    <td><span class="label label-warning">Updating</span></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">40%</div>
                                                        </div>
                                                    </td>
                                                </tr>                                                
                                                <tr>
                                                    <td><strong>Taurus</strong></td>
                                                    <td><span class="label label-warning">Updating</span></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active">
                                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 72%;">72%</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Leo</strong></td>
                                                    <td><span class="label label-success">Support</span></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Virgo</strong></td>
                                                    <td><span class="label label-success">Support</span></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active">
                                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                                        </div>
                                                    </td>
                                                </tr>                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div> -->
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                    </div>
                    
                    <div class="row">
						<div class="col-md-8">
                            
                            <!-- START SALES BLOCK 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Sales</h3>
                                        <span>Sales activity by period you selected</span>
                                    </div>                                     
                                    <ul class="panel-controls panel-controls-title">                                        
                                        <li>
                                            <div id="reportrange" class="dtrange">                                            
                                                <span></span><b class="caret"></b>
                                            </div>                                     
                                        </li>                                
                                        <li><a href="#" class="panel-fullscreen rounded"><span class="fa fa-expand"></span></a></li>
                                    </ul>                                    
                                    
                                </div>
                                <div class="panel-body">                                    
                                    <div class="row stacked">
                                        <div class="col-md-4">                                            
                                            <div class="progress-list">                                               
                                                <div class="pull-left"><strong>In Queue</strong></div>
                                                <div class="pull-right">75%</div>                                                
                                                <div class="progress progress-small progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">75%</div>
                                                </div>
                                            </div>
                                            <div class="progress-list">                                               
                                                <div class="pull-left"><strong>Shipped Products</strong></div>
                                                <div class="pull-right">450/500</div>                                                
                                                <div class="progress progress-small progress-striped active">
                                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">90%</div>
                                                </div>
                                            </div>
                                            <div class="progress-list">                                               
                                                <div class="pull-left"><strong class="text-danger">Returned Products</strong></div>
                                                <div class="pull-right">25/500</div>                                                
                                                <div class="progress progress-small progress-striped active">
                                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">5%</div>
                                                </div>
                                            </div>
                                            <div class="progress-list">                                               
                                                <div class="pull-left"><strong class="text-warning">Progress Today</strong></div>
                                                <div class="pull-right">75/150</div>                                                
                                                <div class="progress progress-small progress-striped active">
                                                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                                                </div>
                                            </div>
                                            <p><span class="fa fa-warning"></span> Data update in end of each hour. You can update it manual by pressign update button</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div id="dashboard-map-seles" style="width: 100%; height: 200px"></div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>-->
                            <!-- END SALES BLOCK -->
                            
                        </div>
						<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-content">
								<ul class="list-inline item-details">
									<li><a href="http://themifycloud.com/downloads/janux-premium-responsive-bootstrap-admin-dashboard-template/">Admin templates</a></li>
									<li><a href="http://themescloud.org">Bootstrap themes</a></li>
								</ul>
							</div>
						</div>
                        
                        <div class="col-md-4">
                            
                            <!-- START SALES & EVENTS BLOCK -->
                            <!-- <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Sales & Event</h3>
                                        <span>Event "Purchase Button"</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-line-1" style="height: 200px;"></div>
                                </div>
                            </div> -->
                            <!-- END SALES & EVENTS BLOCK -->
                            
                        </div>
                    </div>
                    
                    <!-- START DASHBOARD CHART -->
					<!-- <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div> -->
					<div class="block-full-width">
                                                                       
                    </div>                    
                    <!-- END DASHBOARD CHART -->

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
                    <div class="mb-title"><span class="fa fa-sign-in"></span> Log <strong>In</strong>?</div>
                    <div class="mb-footer">
                            <a href="pages-login.php" class="btn btn-success btn-lg">Entrar</a>
                            <a class="btn btn-danger btn-lg mb-control-close">Sair</a>
                    </div>
                     <div class="mb-content">
                        <p>Caso não tenha acesso favor encaminhar mensagem ao admnistrador</p> 
                         <button class="btn btn-default btn-lg mb-control-close">Mensagem</button>
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

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE 
        <script type="text/javascript" src="js/settings.js"></script> -->
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <!-- <script type="text/javascript" src="js/demo_dashboard.js"></script> -->
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>

<script>
$(function(){        
    
    <?php 
        
        $mes_atual = date("m");

        $total_padrao = contadorPilhaPadrao($conexao, $mes_atual);
        $total_npadrao = contadorPilhaNaoPadrao($conexao, $mes_atual);

    ?>

    var listArray = new Array();

    var elemento = {};
    
    //-----------------------------------------------------------------------
    //Indicador maio
    //-----------------------------------------------------------------------
        <?php $itempadrao = contadorPilhaPadrao($conexao, 5);?>
        var total_padrao = <?=$itempadrao['total_padrao'];?>;
        
        <?php $itemnpadrao = contadorPilhaNaoPadrao($conexao, 5);?>
        var total_npadrao = <?=$itemnpadrao['total_npadrao'];?>;

        elemento = {id: 5, mes: "Mai", padrao: total_padrao, npadrao: total_npadrao };
        listArray.push(elemento);
    //-----------------------------------------------------------------------
    
    //-----------------------------------------------------------------------
    //Indicador Abril
    //-----------------------------------------------------------------------
        <?php $itempadrao = contadorPilhaPadrao($conexao, 6);?>
        var total_padrao = <?=$itempadrao['total_padrao'];?>;
        
        <?php $itemnpadrao = contadorPilhaNaoPadrao($conexao, 6);?>
        var total_npadrao = <?=$itemnpadrao['total_npadrao'];?>;

        elemento = {id: 6, mes: "Jun", padrao: total_padrao, npadrao: total_npadrao };
        listArray.push(elemento);
    //-----------------------------------------------------------------------



    ///////////////////////////////////////////////////////////////////////////////////////////////////

    var listArrayTurma = new Array();
    var turma = {};

    //-----------------------------------------------------------------------
    //Pilha padrão por turma mensal Turma A
    //-----------------------------------------------------------------------

    <?php $itempadrao = contadorPilhaPadraoTurmaMes($conexao ,'A', $mes_atual);?>
    var total_padrao = <?=$itempadrao['total_padrao_turma'];?>;

    <?php $itemnpadrao = contadorPilhaNaoPadraoTurmaMes($conexao ,'A', $mes_atual);?>
    var total_npadrao = <?=$itemnpadrao['total_nao_padrao_turma'];?>;

    turma = {padrao: total_padrao, npadrao: total_npadrao};
    listArrayTurma.push(turma);
    //-----------------------------------------------------------------------

    //-----------------------------------------------------------------------
    //Pilha padrão por turma mensal Turma B
    //-----------------------------------------------------------------------

    <?php $itempadrao = contadorPilhaPadraoTurmaMes($conexao ,'B', $mes_atual);?>
    var total_padrao = <?=$itempadrao['total_padrao_turma'];?>;

    <?php $itemnpadrao = contadorPilhaNaoPadraoTurmaMes($conexao ,'B', $mes_atual);?>
    var total_npadrao = <?=$itemnpadrao['total_nao_padrao_turma'];?>;

    turma = {padrao: total_padrao, npadrao: total_npadrao};
    listArrayTurma.push(turma);
    //-----------------------------------------------------------------------

    //-----------------------------------------------------------------------
    //Pilha padrão por turma mensal Turma C
    //-----------------------------------------------------------------------

    <?php $itempadrao = contadorPilhaPadraoTurmaMes($conexao ,'C', $mes_atual);?>
    var total_padrao = <?=$itempadrao['total_padrao_turma'];?>;

    <?php $itemnpadrao = contadorPilhaNaoPadraoTurmaMes($conexao ,'C', $mes_atual);?>
    var total_npadrao = <?=$itemnpadrao['total_nao_padrao_turma'];?>;

    turma = {padrao: total_padrao, npadrao: total_npadrao};
    listArrayTurma.push(turma);
    //-----------------------------------------------------------------------

    //-----------------------------------------------------------------------
    //Pilha padrão por turma mensal Turma D
    //-----------------------------------------------------------------------

    <?php $itempadrao = contadorPilhaPadraoTurmaMes($conexao ,'D', $mes_atual);?>
    var total_padrao = <?=$itempadrao['total_padrao_turma'];?>;

    <?php $itemnpadrao = contadorPilhaNaoPadraoTurmaMes($conexao ,'D', $mes_atual);?>
    var total_npadrao = <?=$itemnpadrao['total_nao_padrao_turma'];?>;

    turma = {padrao: total_padrao, npadrao: total_npadrao};
    listArrayTurma.push(turma);
    //-----------------------------------------------------------------------



    console.log(listArrayTurma);

    //-----------------------------------------------------------------------
    // Grafico de pizza com percentual de pilha padrao no mes 
    //----------------------------------------------------------------------- 

    var total_padrao = <?=$total_padrao['total_padrao']?>;
    var total_npadrao = <?=$total_npadrao['total_npadrao']?>;

    var pe_padrao = total_padrao / (total_padrao + total_npadrao) * 100;
    var pe_npadrao = 100 - pe_padrao;

    pe_padrao = parseFloat(pe_padrao.toFixed(2));
    pe_npadrao = parseFloat(pe_npadrao.toFixed(2));
  

    
    /* Donut dashboard chart */
    Morris.Donut({
        element: 'dashboard-donut-1',
        data: [
            {label: "%Padrão", value: pe_padrao},
            {label: "%Não Padrão", value: pe_npadrao}
            
        ],
        colors: ['#33414E', '#1caf9a'],
        resize: true
    });
    /* END Donut dashboard chart */
	
	
    /* Bar dashboard chart */
    Morris.Bar({
        element: 'dashboard-bar-1',
        data: [
            { y: listArray[0].mes, a: listArray[0].padrao , b: listArray[0].npadrao },
            { y: listArray[1].mes, a: listArray[1].padrao , b: listArray[1].npadrao }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Padrão', 'Nãp Padrão'],
        barColors: ['#1caf9a', '#33414E'],
        gridTextSize: '10px',
        hideHover: true,
        resize: true,
        gridLineColor: '#E5E5E5'
    });
    /* END Bar dashboard chart */

     /* Bar dashboard chart */
     Morris.Bar({
        element: 'dashboard-bar-turma',
        data: [
            { y: 'Turma A', a:listArrayTurma[0].padrao , b: listArrayTurma[0].npadrao },
            { y: 'Turma B', a:listArrayTurma[1].padrao , b: listArrayTurma[1].npadrao },
            { y: 'Turma C', a:listArrayTurma[2].padrao , b: listArrayTurma[2].npadrao },
            { y: 'Turma D', a:listArrayTurma[3].padrao , b: listArrayTurma[3].npadrao }
        ],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Padrão', 'Não Padrão'],
        barColors: ['#1caf9a', '#33414E'],
        gridTextSize: '7px',
        hideHover: true,
        resize: true,
        gridLineColor: '#E5E5E5'
    });
    /* END Bar dashboard chart */
    
    /* Moris Area Chart */
      Morris.Area({
      element: 'dashboard-area-1',
      data: [
        { y: '2014-10-10', a: 17,b: 19},
        { y: '2014-10-11', a: 19,b: 21},
        { y: '2014-10-12', a: 22,b: 25},
        { y: '2014-10-13', a: 20,b: 22},
        { y: '2014-10-14', a: 21,b: 24},
        { y: '2014-10-15', a: 34,b: 37},
        { y: '2014-10-16', a: 43,b: 45}
      ],
      xkey: 'y',
      ykeys: ['a','b'],
      labels: ['Sales','Event'],
      resize: true,
      hideHover: true,
      xLabels: 'day',
      gridTextSize: '10px',
      lineColors: ['#1caf9a','#33414E'],
      gridLineColor: '#E5E5E5'
    });
    /* End Moris Area Chart */
    /* Vector Map */
    var jvm_wm = new jvm.WorldMap({container: $('#dashboard-map-seles'),
                                    map: 'world_mill_en', 
                                    backgroundColor: '#FFFFFF',                                      
                                    regionsSelectable: true,
                                    regionStyle: {selected: {fill: '#B64645'},
                                                    initial: {fill: '#33414E'}},
                                    markerStyle: {initial: {fill: '#1caf9a',
                                                   stroke: '#1caf9a'}},
                                    markers: [{latLng: [50.27, 30.31], name: 'Kyiv - 1'},                                              
                                              {latLng: [52.52, 13.40], name: 'Berlin - 2'},
                                              {latLng: [48.85, 2.35], name: 'Paris - 1'},                                            
                                              {latLng: [51.51, -0.13], name: 'London - 3'},                                                                                                      
                                              {latLng: [40.71, -74.00], name: 'New York - 5'},
                                              {latLng: [35.38, 139.69], name: 'Tokyo - 12'},
                                              {latLng: [37.78, -122.41], name: 'San Francisco - 8'},
                                              {latLng: [28.61, 77.20], name: 'New Delhi - 4'},
                                              {latLng: [39.91, 116.39], name: 'Beijing - 3'}]
                                });    
    /* END Vector Map */

    
    $(".x-navigation-minimize").on("click",function(){
        setTimeout(function(){
            rdc_resize();
        },200);    
    });
    
    
});

</script>

<script>
    function validaMes() {
        var comboNome = document.getElementById("name");
        if (comboNome.options[comboNome.selectedIndex].value == "" ){
                alert("Selecione um nome antes de prosseguir");
                return false;
        }
        else{
            return true;
        }
    }    
</script>





