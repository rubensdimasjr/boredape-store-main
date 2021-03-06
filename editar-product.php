<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Produto;

/* VALIDAÇÃO DO ID */

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header("Location: admin-product.php?status=error");
  exit;
}

$obProduto = Produto::getProdutoId($_GET['id']);

/* VALIDAÇÃO DO USUARIO */
if (!$obProduto instanceof Produto) {
  header("Location: admin-product.php?status=error");
  exit;
}

if (isset($_POST['edita-produto'])) {

  $obProduto->nome_produto = $_POST['nome_produto'];
  $obProduto->preco_produto = $_POST['preco_produto'];
  $obProduto->imagem_produto = $_FILES['imagem_produto'];
  $obProduto->favoritos = $_POST['favoritos'];
  $obProduto->atualizarProduto();

  header("Location: admin-product.php?status=success");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Produto</title>

  <!-- Bootstrap style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!-- Reset Css -->
  <link href="./assets/css/reset.css" rel="stylesheet" />

  <!-- Icon Style -->
  <script src="https://kit.fontawesome.com/cf4fb9e680.js" crossorigin="anonymous"></script>
</head>

<body>
  <!--   <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand"><i class="fa-brands fa-ethereum text-warning"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Register Page</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./contact.html">Contato</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../">Página Inicial</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->

  <main>
    <div class="container">
      <div class="row mt-5">
        <div class="col-xs-12 col-md-8 col-lg-5 mx-auto">
          <div class="card">
            <div class="card-body">
              <form enctype="multipart/form-data" method="post">
                <div class="mb-4">
                  <label for="imagem_produto" class="form-label">Imagem Produto</label>
                  <input type="file" class="form-control" name="imagem_produto" disabled>
                  <div class="my-2 text-center">
                    <button class="btn btn-outline-warning">Mudar imagem</button>
                  </div>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nome do Produto" name="nome_produto" value="<?= $obProduto->nome_produto ?>" required>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Preço do Produto" name="preco_produto" value="<?= $obProduto->preco_produto ?>" required>
                </div>
                <div class="btn-group mb-3">
                  <a href="./admin-product.php" class="btn btn-success me-2">Cancelar</a>
                  <input type="submit" name="edita-produto" class="btn btn-danger " value="Editar Produto">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap script js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>