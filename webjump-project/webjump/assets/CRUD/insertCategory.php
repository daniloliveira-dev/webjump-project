<?php
    //INCLUDE DO ARQUIVO DE CONEXAO COM O BANCO DE DADOS.
    include_once 'config.php';

    //-- VERIFICA SE O BOTAO SUBMIT FOI SETADO.
    if(isset($_GET['submit'])){
    
    //-- VARIAVEIS BUSCADAS VIA GET NO FORM.
    $nome = $_GET["nome"];
    $categoria = $_GET["codigo"];
    
    //-- QUERY DE INSERT NO BANCO.
    $sqlInsert  = "INSERT INTO categoria VALUES ('','" . $nome ."','". $categoria ."')";

    //-- RESULTADO DA QUERY.
    $result = $conexao->query($sqlInsert);
    
    //-- VERIFICA SE A QUERY RODOU CORRETAMENTE.
    if($result->num_rows > 0){
        //--TRUE: TE RETORNA A MENSAGEM DE ERRO.
        echo '<br><script>alert("Insert not executed!")</script>';
    }
    //-- FALSE: TE RETORNA A MENSAGEM AVISANDO QUE A QUERY FOI EXECUTADA CORRETAMENTE.
        else{

            echo '<script>alert("Category inserted successfully!")</script>';
            //-- REDIRECIONA NOVAMENTE A PAGINA DE PRODUTOS.
            header('location: ../categories.php');
        }
    }

?>