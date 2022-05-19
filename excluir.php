<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;

/* VALIDAÇÃO DO ID */

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header("Location: admin.php?status=error");
  exit;
}

/* CONSULTA O USUARIO */
$obUsuario = Usuario::getUsuarioId($_GET['id']);

/* VALIDAÇÃO DO USUARIO */
if (!$obUsuario instanceof Usuario) {
  header("Location: admin.php?status=error");
  exit;
}

if (isset($_POST['excluir'])) {

  $obUsuario->excluir();

  /*   $obUsuario->cadastrar(); */

  header("Location: admin.php?status=success");
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Page</title>

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
              <form method="post">
                <div class="mb-3">
                  <p>Você realmente deseja excluir <strong><?= $obUsuario->nome ?></strong>?</p>
                </div>
                <div class="mb-3 text-center">
                  <a class="btn btn-success col-6" href="./admin.php">Cancelar</a>
                  <input type="submit" class="btn btn-danger col-6" name="excluir" value="Excluir" />
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