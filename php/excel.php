<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("conecta.php");
    require_once("banco-pilha-padrao.php");
    require_once("logica-usuario.php");
    require_once("login.php");


    if($_POST['mes'] == ""){
        echo "<script>alert('Selecione o mês para extrair relatório' );</script>";
        echo "<script>window.location='../cadastro-pilha-padrao.php';</script>";
    }else{
        $p = $_POST['mes'];  
        //varre array
        $pilhas = listaRelatorioMes($conexao, $p);

        //declaramos uma variavel para monstarmos a tabela
        $dadosXls  = '';
        $dadosXls .= '<table>';
        $dadosXls .= '<tr>';
        $dadosXls .= '<th>Data</th>';
        $dadosXls .= '<th>Turno</th>';
        $dadosXls .= '<th>Turma</th>';
        $dadosXls .= '<th>Pilha</th>';
        $dadosXls .= '<th>Balizamento</th>';
        $dadosXls .= '<th>Material</th>';
        $dadosXls .= '<th>Empilhamento</th>';
        $dadosXls .= '<th>Número de Lotes</th>';
        $dadosXls .= '<th>Status</th>';
        $dadosXls .= '<th>Ângulo de empilhamento</th>';
        $dadosXls .= '<th>Tipo de empilhamento</th>';
        $dadosXls .= '<th>Cabeção/Barriga</th>';
        $dadosXls .= '<th>Capacidade empilhamento</th>';
        $dadosXls .= '<th>Espaçamento entre pilhas</th>';
        $dadosXls .= '<th>Espaçamento entre berma</th>';
        $dadosXls .= '<th>Espaçamento entre via</th>';
        $dadosXls .= '<th>Choveu?</th>';
        $dadosXls .= '<th>Água na base?</th>';
        $dadosXls .= '<th>Saldo no início?</th>';
        $dadosXls .= '<th>Operador</th>';
        $dadosXls .= '</tr>';
        foreach($pilhas as $pilha) {    
            $dadosXls .= '<tr>';
            $dadosXls .= '<td>'.date('d-m-Y H:i', strtotime($pilha['data_cadastro'])).'</td>';
            $dadosXls .= '<td>'.$pilha['turno_cadastro'].'</td>';
            $dadosXls .= '<td>'.$pilha['turma_cadastro'].'</td>';
            $dadosXls .= '<td>'.$pilha['pilha_cadastro'].'</td>';
            $dadosXls .= '<td>'.$pilha['balizamento_cadastro'].'</td>';
            $dadosXls .= '<td>'.$pilha['nome_produto'].'</td>';
            $dadosXls .= '<td>'.$pilha['tipoempilhamento_cadastro'].'</td>';
            $dadosXls .= '<td>'.$pilha['lotes_cadastro'].'</td>';
            $dadosXls .= '<td>'.$pilha['padrao_cadastro'].'</td>';
            $dadosXls .= '<td>'.($pilha['angulo_empilhamento'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['tipo_empilhamento'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['cabecao_empilhamento'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['capacidade_empilhamento'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['espacamento_pilha'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['espacamento_berma'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['espacamento_via'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['choveu'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['agua_base'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.($pilha['saldo_pilha'] == "true" ? "Sim" : "Não").'</td>';
            $dadosXls .= '<td>'.$pilha['nome_usuario'].'</td>';
            $dadosXls .= '</tr>';
        }
        $dadosXls .= '</table>';

        // Definimos o nome do arquivo que será exportado  
        $arquivo = "Pilhas-mes-$p.xls";  
        // Configurações header para forçar o download  
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$arquivo.'"');
        header('Cache-Control: max-age=0');
        // Se for o IE9, isso talvez seja necessário
        header('Cache-Control: max-age=1');
        
        // Envia o conteúdo do arquivo  
        echo $dadosXls;  
        exit;
    }
?>