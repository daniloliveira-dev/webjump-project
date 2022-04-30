<?php

    //--DADOS DO BANCO DE DADOS NOME DO HOST, NOME DO BANCO, USUARIO, SENHA.
    $hostname = 'localhost';
    $dbname = 'webjump_db';
    $user = 'root';
    $pass = '';

    //--CONEXAO PARA VERIFICAR SE O BANCO ESTÁ PEGANDO OS DADOS.
    $conexao = mysqli_connect($hostname,$user,$pass,$dbname);
    
    //--VERIFICA SE O BANCO ESTÁ TRAZENDO OS DADOS DA TABELA PRODUTO.
    $sqlSelect = "SELECT * FROM produto";
    $result = $conexao->query($sqlSelect);
?>