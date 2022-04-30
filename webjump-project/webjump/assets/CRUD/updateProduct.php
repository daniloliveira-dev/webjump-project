<?php

  //-- VERIFICA SE FOI SETADO O BOTAO E O ID QUE FORAM RECEBIDOS VIA POST DO FORM.
  if(isset($_POST['update']) && isset($_POST['id'])){

    //-- INCLUDE DA CONEXAO COM O BANCO DE DADOS.
    include_once('config.php');
    
    //-- VERIFICA SE O BANCO ESTÁ RETORNANDO OS DADOS DO SELECT.
    if($result->num_rows > 0){

      //-- VARIAVEIS RECEBIDAS DO FORM VIA POST.
      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $sku = $_POST['sku'];
      $descricao = $_POST['descricao'];
      $quantidade = $_POST['quantidade'];
      $preco = $_POST['preco'];
      $categoria = $_POST['categoria'];

      //-- QUERY UPDATE PARA ATUALIZAR OS DADOS DA TABELA NA QUAL O ID E A CHAVE PRIMARIA IDENTIFICADORA.
      $sqlUpdate = "UPDATE produto SET nome=". "'" . $nome . "'" . ",". "sku=". "'" . $sku . "'" . "," . "descricao=" . "'" . $descricao . "'" . "," . "quantidade=" . "'" . $quantidade . "'" . "," . "preco=" . "'" . $preco . "'" . "," . "categoria=" . "'" . $categoria . "'" . " WHERE id=". "'" .$id . "'";
      
      //-- EXECUCAO DA QUERY. 
      $update = $conexao->query($sqlUpdate);

      //-- VERIFICACAO SE A QUERY FOI EXECUTADA CORRETAMENTE. CASO SEJA TRUE, AS ALTERACOES FORAM EXECUTADAS.
      if($update->num_rows < 1){
        
      //-- MENSAGEM POP UP AVISANDO QUE FOI EXECUTADA CORRETAMENTE A MUDANCA.
      echo '<script>alert("Changes with successfully!")</script>';

      //-- REDIRECIONA NOVAMENTE PARA A PAGINA DE PRODUTOS.
      header('location: ../products.php');

      }
      //-- CASO SEJA FALSE LHE RETORNARA A MENSAGEM AVISANDO DO ERRO.
      else{
      echo '<script>alert("Unexpected error!")</script>';
        }
      }
    }
?>