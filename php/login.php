<?php
  require_once("banco-usuario.php");
  require_once("logica-usuario.php");

  // $usuario = buscaUsuario($conexao, $_POST["matricula"], $_POST["senha"]);

  // variável ira receber uusario logado no windows
  //$operadorLogado = "01477952";
  
function conexaoMenu($conexao, $matricula) {
  //$senhaMd5 = md5($senha);
  $usuario = buscaLoginOperador($conexao, $matricula);

   if ($usuario != null) {

       idUsuario($usuario['id_usuario']);
   	   logaUsuario($usuario["nome_usuario"]);     //($_POST["email"]);x`
       idMatricula($usuario['matricula_usuario']);
       idPerfil($usuario['tipo_usuario']);
       $_SESSION["success"] = "Login realizado com sucesso !";
       
       ?>
       <script type="text/javascript">
                  alert("Bem vindo: <?= usuarioLogado() ?>");
                  window.location="inicio.php";
       </script>
       
      <?php

       //$nomeFuncao = buscaFuncao($conexao, MatriculaLogado());
       
       
       /*if($nomeFuncao['nomeFuncao'] == "Administrador"){
           ?>
             <script type="text/javascript">
                        alert("Bem vindo, <?= usuarioLogado() ?>, <?= $nomeFuncao['nomeFuncao'] ?>");
                        window.location="../administrador.php";
             </script>
           <?php
       }
       
       if($nomeFuncao['nomeFuncao'] == "Empilhadeiras"){
           ?>
             <script type="text/javascript">
                        alert("Bem vindo, <?= usuarioLogado() ?>, <?= $nomeFuncao['nomeFuncao'] ?>");
                        window.location="../empilhadeira.php";
             </script>
           <?php
       }*/
       
        
      
   } else {
       $_SESSION["danger"] = "Autenticação falhou !";
       ?>
             <script type="text/javascript">
                        alert("Login ou senha inválidos");
                        window.location="../page-login.php";
             </script>
           <?php
   }
   die();
  
   return $usuario;

  }
  
?>
