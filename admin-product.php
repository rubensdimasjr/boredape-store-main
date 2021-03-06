<?php
require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Produto;

$produtos = Produto::getProduto();

if (isset($_POST['nome_produto'], $_POST['preco_produto'], $_FILES['imagem_produto'], $_POST['favoritos'])) {

  $obProduto = new Produto;

  $obProduto->nome_produto = $_POST['nome_produto'];
  $obProduto->preco_produto = $_POST['preco_produto'];
  $obProduto->imagem_produto = $_FILES['imagem_produto'];
  $obProduto->favoritos = $_POST['favoritos'];
  $obProduto->cadastraProduto();

  header("Location: admin-product.php?status=success");
  exit;
}

$resultados = '';
foreach ($produtos as $produto) {
  $resultados .= '<tr>
                    <td><img src="./images/' . $produto->nome_img . '" class="img-fluid rounded-circle" alt="BoredApe-' . $produto->id_produto . '" width="50" height="50"></td>
                    <td scope="row" style="vertical-align:middle !important">' . $produto->id_produto . '</td>
                    <td style="vertical-align:middle !important">' . $produto->nome_produto . '</td>
                    <td style="vertical-align:middle !important">' . $produto->preco_produto . '</td>
                    <td style="vertical-align:middle !important">
                      <a href="editar-product.php?id=' . $produto->id_produto . '" class="btn btn-secondary">Editar</a>
                      <a href="excluir-produto.php?id=' . $produto->id_produto . '" class="btn btn-danger">Deletar</a>
                    </td>
                  </tr>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Produtos</title>

  <!-- Bootstrap style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Reset Css -->
  <link href="./assets/css/reset.css" rel="stylesheet">

  <!-- Icon Style -->
  <script src="https://kit.fontawesome.com/cf4fb9e680.js" crossorigin="anonymous"></script>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand"><i class="fa-brands fa-ethereum text-warning"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./admin.php">Administração</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container my-5">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-lg-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3 class="mt-2 text-center">Add Novo Produto</h3>
            </div>
            <div class="card-body">
              <form enctype="multipart/form-data" method="post">
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Nome do Produto" name="nome_produto" required>
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" placeholder="Preço do Produto" name="preco_produto" required>
                </div>
                <div class="mb-4">
                  <label for="imagem_produto" class="form-label">Imagem Produto</label>
                  <input type="file" class="form-control" name="imagem_produto" required>
                </div>
                <input type="hidden" name="favoritos" value="0">
                <div class="mb-3 text-center">
                  <input type="submit" class="btn btn-success col-6" value="Add Produto">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5 table-responsive d-flex">
        <table class="table mt-3">
          <thead class="table-dark">
            <tr>
              <th scope="col">Imagem Produto</th>
              <th scope="col">#</th>
              <th scope="col">Nome Produto</th>
              <th scope="col">Preço Produto</th>
              <th scope="col">Ação</th>
            </tr>
          </thead>
          <tbody>
            <?= $resultados ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- Bootstrap script js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>