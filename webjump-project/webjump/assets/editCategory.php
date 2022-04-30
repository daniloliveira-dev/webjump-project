<?php 

    //-- VERIFICA SE O ID FOI SETADO AO CLICAR NO BOTAO EDITAR.
    if(!empty($_GET['id'])){

      //-- INCLUDE DA CONEXAO COM O BANCO.
      include_once('../assets/CRUD/config.php');

      $id = $_GET['id'];

      //-- QUERY SELECT PARA TRAZER OS DADOS A SEREM MOSTRADOS NA TABELA.
      $sqlSelect = "SELECT * FROM categoria WHERE id=".$id;

      //-- EXECUCAO DA QUERY.
      $result = $conexao->query($sqlSelect);

      //-- VERIFICA SE A QUERY RODOU CORRETAMENTE. CASO SEJA TRUE, RETORNA TODOS OS DADOS DA TABELA.
      if($result->num_rows > 0){

        //-- ESTRUTURA QUE PEGA OS DADOS DIRETAMENTE NO BANCO PARA VERIFICAR SE ESTAO SENDO BUSCADOS CORRETAMENTE.
        while($dados = mysqli_fetch_assoc($result)){

          //-- VARIAVEIS COM OS NOMES DAS COLUNAS DO BANCO A SEREM VISUALIZADAS.
          $id = $dados['id'];
          $codigo = $dados['codigo_categoria'];
          $nome = $dados['nome_categoria'];;
        }
      }
      //-- CASO SEJA FALSE, NÃO RETORNARÁ NENHUM DADO.
      else{}
    }
?>
<!doctype html>
<html ⚡>
<head>
  <title>Webjump | Backend Test | Add Category</title>
  <meta charset="utf-8">

<link  rel="stylesheet" type="text/css"  media="all" href="css/style.css" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800" rel="stylesheet">
<meta name="viewport" content="width=device-width,minimum-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script></head>
  <!-- Header -->
<amp-sidebar id="sidebar" class="sample-sidebar" layout="nodisplay" side="left">
  <div class="close-menu">
    <a on="tap:sidebar.toggle">
      <img src="images/bt-close.png" alt="Close Menu" width="24" height="24" />
    </a>
  </div>
  <a href="index.php"><img src="images/menu-go-jumpers.png" alt="Welcome" width="200" height="43" /></a>
  <div>
    <ul>
      <li><a href="categories.php" class="link-menu">Categorias</a></li>
      <li><a href="products.php" class="link-menu">Produtos</a></li>
    </ul>
  </div>
</amp-sidebar>
<header>
  <div class="go-menu">
    <a on="tap:sidebar.toggle">☰</a>
    <a href="index.php" class="link-logo"><img src="images/go-logo.png" alt="Welcome" width="69" height="430" /></a>
  </div>
  <div class="right-box">
    <span class="go-title">Administration Panel</span>
  </div>    
</header>  
<!-- Header -->
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">New Category</h1>
    
    <form method="GET" action="../assets/CRUD/updateCategory.php">
      <div class="input-field">

        <?php //EXIBICAO DOS DADOS DA TABELA VIA SELECT NO BANCO. ?>
        
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" id="category-name" name="nome" value="<?php echo $nome ?>" class="input-text" required/>
        
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" id="category-code" name="codigo" value="<?php echo $codigo ?>" class="input-text" required />
        
      </div>
      <div class="actions-form">
        <a href="categories.php" class="action back">Back</a>
        <input class="btn-submit btn-action" name="update" type="submit" value="Save changes"/>
      </div>
    </form>
  </main>
  <!-- Main Content -->

  <!-- Footer -->
<footer>
	<div class="footer-image">
	  <img src="images/go-jumpers.png" width="119" height="26" alt="Go Jumpers" />
	</div>
	<div class="email-content">
	  <span>go@jumpers.com.br</span>
	</div>
</footer>
 <!-- Footer --></body>
</html>