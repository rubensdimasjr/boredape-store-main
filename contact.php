<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contato BoredApe Store</title>

    <!-- Bootstrap style -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Reset Css -->
    <link href="./assets/css/reset.css" rel="stylesheet" />

    <!-- Icon Style -->
    <script
      src="https://kit.fontawesome.com/cf4fb9e680.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand"
            ><i class="fa-brands fa-ethereum text-warning"></i
          ></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Contato</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./login.php">Entrar/Cadastrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./">Página Inicial</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <div class="container h-100 d-flex">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-12 col-lg-6 mb-4">
            <img
              src="./assets/images/contact_us.svg"
              class="img-fluid"
              alt="Contact Us"
            />
          </div>
          <div class="col-md-12 col-lg-6">
            <form>
              <div class="card">
                <div class="card-header">
                  <h5 class="text-center mt-2">Nos envie uma mensagem!</h5>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input
                      type="text"
                      class="form-control"
                      name="nome"
                      id="nome"
                    />
                  </div>
                  <div class="row g-2 mb-3">
                    <div class="col">
                      <label for="email" class="form-label">E-mail</label>
                      <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                      />
                    </div>
                    <div class="col">
                      <label for="celular" class="form-label">Celular</label>
                      <input
                        type="text"
                        class="form-control"
                        name="celular"
                        id="celular"
                        placeholder="(XX)X XXXX-XXXX"
                      />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="assunto" class="form-label">Assunto: </label>
                    <textarea
                      class="form-control"
                      rows="4"
                      name="assunto"
                    ></textarea>
                  </div>
                  <div class="mb-3 text-center">
                    <input
                      type="submit"
                      class="btn btn-primary col-5"
                      value="Enviar"
                    />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <!-- Bootstrap script js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
