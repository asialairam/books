<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>BOOKS</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="js/script.js" defer></script>
</head>

<body>

  <header>
    <aside>
      <form action="">
        <div class="form-group">
          <label for="txt_email">E-MAIL</label>
          <input type="email" name="txt_email" id="txt_email" class="form-control">
        </div>

        <div class="form-group">
          <label for="txt_senha">SENHA</label>
          <input type="password" name="txt_senha" id="txt_senha" class="form-control">
        </div>

        <a href="#">ESQUECI A SENHA</a>
        <div>
          <input type="submit" value="LOGIN" class="btn btn-primary">
          <a href="#" class="btn btn-primary">CADASTRE-SE</a>
        </div>
      </form>
    </aside>
    
    <h1> 
      <?= "BOOKS"; ?> 
    </h1>

    <h2> 
      <?php echo "eu amo o IFRN"?> 
    </h2>
    
  </header>

  <main>
    <form action="ws/salvar-livro.php" class="form-inline justify-content-center">
      <div class="form-group">
        <input type="text" name="txt_livro" id="txt_livro" class="form-control">
        <input type="button" value="SALVAR" class="btn btn-primary" onclick="criarLivro()">
      </div>
    </form>
    
      <div id="livros"> 
        
      <?php 
      require_once "model/Conexao.php";
      $sql = "SELECT * FROM book;";
        if(!Conexao::execWithReturn($sql)){
          echo Conexao::getErro();
          exit(1);
        } 
      // print_r(Conexao::getData());

      foreach(Conexao::getData() as $livro):
      ?>
        
    <section id="sessaoDeLivros">
      <article>
        <div>
          <img src="img/clc.jpg" alt="Foto do livro">
        </div>

        <div class="livro-dados">
          <h3>Livro: 
          <span id="livro-nome">
            <?= $livro["nome"]?>
          </span>
          </h3>
          
          <h3>Páginas: 
            <span id="livro-paginas">
              <?= $livro["paginas"]?>
            </span>
          </h3>
          
          <h3>Autor/a/as/es: 
            <span id="livro-autores">
              <?= $livro["autor"]?>
            </span>
          </h3>
        </div>

        <div>
          <div class="marcador">
            <span class="material-icons">book</span>
            <span class="contador">12</span>
          </div>
          <div class="marcador">
            <span class="material-icons">favorite</span>
            <span class="contador">12</span>
          </div>
        </div>
      </article>
    </section>
    <?php endforeach; ?>
  </main>

</body>

</html>