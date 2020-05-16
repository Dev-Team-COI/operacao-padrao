<!DOCTYPE html>
<?php require_once("php/logica-usuario.php"); ?>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>PS.on</title>            
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
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
              <div class="login-logo"></div>                                    
                <div class="login-body">
                    <div class="login-title"><strong>Bem vindo</strong>, Operação Padrão</div>
                      <?php 
                        if ( usuarioEstaLogado() ) { ?>
                            <p class="alert-success">
                                Você está logado como
                                <?= usuarioLogado() ?>
                                    <a href="php/logout.php"> [Sair]</a>
                            </p>
                    <?php
                        } else { ?>
                    <form action="php/login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="matricula" class="form-control" placeholder="Matrícula"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="senha" class="form-control" placeholder="Senha"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Esquceu a senha?</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                        </div>
                    </div>
                    </form>
                      <?php } 
                ?>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 Ps.on
                    </div>
                    <div class="pull-right">
                        <a href="index.php">Página Principal</a> |
                        <a href="#">Sobre</a> |
                        <a href="#">Contato</a> 
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






