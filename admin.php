<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;

$usuarios = Usuario::getUsuario();

$resultados = '';
foreach ($usuarios as $usuario) {
  $resultados .= '<tr>
                    <td scope="row">' . $usuario->id . '</td>
                    <td>' . $usuario->nome . '</td>
                    <td>' . $usuario->email . '</td>
                    <td>' . $usuario->senha . '</td>
                    <td>
                      <a href="editar.php?id=' . $usuario->id . '" class="btn btn-secondary">Editar</a>
                      <a href="excluir.php?id=' . $usuario->id . '" class="btn btn-danger">Deletar</a>
                    </td>
                  </tr>';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administração</title>

  <!-- Bootstrap style -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!-- Reset Css -->
  <link href="./assets/css/reset.css" rel="stylesheet" />

  <!-- Icon Style -->
  <script src="https://kit.fontawesome.com/cf4fb9e680.js" crossorigin="anonymous"></script>
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand"><i class="fa-brands fa-ethereum text-warning"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Administração</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./admin-product.php">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="container my-5">
      <div class="row table-responsive">
        <h3 class="text-center fw-bold">Lista de Usuários</h3>
        <table class="table mt-3">
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">E-mail</th>
              <th scope="col">Senha</th>
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