<?php  		
 require_once("conecta.php");			
 require_once("banco-pilha-padrao.php"); 

 $id = $_POST['id_excluir'];

 $item = listaCadastroIndividual($conexao, $id);

 $p = $item['pilha_cadastro'];
 $c = $item['id_periodo_chuvoso'];

 
//  if(removeCheckArea($conexao,6)){
     
//      echo "<script>alert('Id periodo chuvoso ' + '$c' + ' removida com sucesso');</script>";
//      echo "<script>window.location='../lista-pilha-padrao.php';</script>";

//  }else{

//     echo "<script>alert('ERRO');</script>";
//  }
 
 removePilhaPadrao($conexao, $id);

    removeCheckArea($conexao, $item['id_periodo_chuvoso']);
    removeCheckPilhaPadrao($conexao, $item['id_pilha_padrao']);
    
    echo "<script>alert('Pilha ' + '$p' + ' removida com sucesso');</script>";
    echo "<script>window.location='../lista-pilha-padrao.php';</script>";
    

