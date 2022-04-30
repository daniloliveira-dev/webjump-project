<?php

    //INCLUDE DO ARQUIVO DE CONEXAO COM O BANCO DE DADOS.
    include_once 'config.php';


    //-- VERIFICA SE O BOTAO SUBMIT FOI SETADO.
    if(isset($_POST['submit'])){
    
    //-- VARIAVEIS BUSCADAS VIA POST NO FORM.
    $nome = $_POST["nome"];
    $sku = $_POST["sku"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];
    $categoria = $_POST["categoria"];
    
    //-- QUERY DE INSERT NO BANCO.
    $sqlInsert  = "INSERT INTO produto VALUES ('','" . $nome ."','". $sku ."','". $descricao ."','". $quantidade ."','". $preco . "','" . $categoria ."')";
    var_dump($sqlInsert);

    //-- RESULTADO DA QUERY.
    $result = $conexao->query($sqlInsert);
    
    //-- VERIFICA SE A QUERY RODOU CORRETAMENTE.
    if($result->num_rows > 0){
        //--TRUE: TE RETORNA A MENSAGEM DE ERRO.
        echo '<br><script>alert("Insert not executed!")</script>';
    }
        //-- FALSE: TE RETORNA A MENSAGEM AVISANDO QUE A QUERY FOI EXECUTADA CORRETAMENTE.
        else{
            echo '<script>alert("Product inserted successfully!")</script>';

            //-- REDIRECIONA NOVAMENTE A PAGINA DE PRODUTOS.
            header('location: ../products.php');
        }
    }
