<?php

  //--VERIFICA SE OS GETS FORAM SETADOS.
  if(isset($_GET['update']) && !empty($_GET['id'])){

    //-- INCLUDE DO ARQUIVO DE CONEXAO COM BANCO
    include_once('config.php');
    
    //-- VERIFICA SE O BANCO ESTÁ CONECTADO.
    if($result->num_rows > 0){

      //--PEGA OS DADOS GET DO FORMULARIO.
      $id = $_GET['id'];
      $codigo = $_GET['codigo'];
      $nome = $_GET['nome'];

      //-- QUERY DE ATUALIZAÇÃO DOS DADOS DA TABELA NA QUAL OS ITENS SERAO IDENTIFICADOS PELO ID.
      $sqlUpdate = "UPDATE categoria SET codigo_categoria=". "'" . $codigo . "'" . ",". "nome_categoria=". "'" . $nome ."'" . " WHERE id='" .$id."'";

      //-- EXECUTA A QUERY.
      $update = $conexao->query($sqlUpdate);

      //-- VERIFICA SE A QUERY RODOU CORRETAMENTE. CASO SEJA TRUE SIGNIFICA QUE O ITEM FOI ATUALIZADO.
      if($update->num_rows < 1){

        //-- DEVOLVE UMA MENSAGEM POPUP AVISANDO QUE FOI ADICIONADA.
        echo '<script>alert("Changes with successfully!")</script>';

        //-- REDIRECIONA PARA A PAGINA DE CATEGORIAS.
        header('location: ../categories.php');
        

        }
        //-- CASO SEJA FALSE, VOCE RECEBE UMA MENSAGEM POPUP AVISANDO DO ERRO.
        else{
          echo '<script>alert("Unexpected error!")</script>';
        }
      }
    }
?>