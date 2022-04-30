<?php
    //-- VERIFICA SE O ID E EXISTENTE.
    if(!empty($_GET['id'])){

    //-- INCLUDE DO BANCO DE DADOS.
    include_once('config.php');

    //-- VARIAVEL QUE ARMAZENA O DADO RECEBIDO DO FORM VIA GET.
    $id = $_GET['id'];

    //-- QUERY USADA PARA BUSCAR OS DADOS DENTRO DA TABELA ONDE O ID E A CHAVE PRIMARIA IDENTIFICADORA.
    $sqlSelect = "SELECT * FROM produto WHERE id=". $id;

    //-- EXECUCAO DA QUERY.
    $result = $conexao->query($sqlSelect);

    //-- VERIFICA SE A QUERY SELECT RODOU CORRETAMENTE. CASO SEJA TRUE IRA RODAR A QUERY DE DELETE.
    if($result->num_rows > 0){
        
    //-- QUERY DE DELETE.
    $sqlDelete = "DELETE FROM produto WHERE id=".$id;
        
    //-- RETORNO DA QUERY NO BANCO.
    $delete = $conexao->query($sqlDelete);
    //var_dump($sqlDelete);

    //-- MENSAGEM POP UP QUE LHE RETORNA CASO O ITEM SEJA DELETADO CORRETAMENTE.
    echo '<script>alert("Delete successfully!!")</script>';

    //-- REDIRECIONA PARA A PAGINA DE PRODUTOS.
    header('location: ../products.php');
    }
    
    //-- CASO O ITEM SEJA NAO SEJA DELETADO, TE RETORNARA UMA MENSAGEM DE ERRO AVISANDO.
    else{
             echo '<script>alert("Delete not executed!!")</script>';
        }
    }
?>