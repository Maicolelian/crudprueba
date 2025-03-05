<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Inicio de sesion</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?=base_url('login/index')?>">Registrarse</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card" style="margin-top: 30px">
                    <div class="card-header text-center">
                        Iniciar sesion
                    </div>
                    <?php
                    $this->input->post('email');
                    $this->input->post('password'); ?>

                    <div class="card-body">
                        <form method="post" autocomplete="off" action="<?=base_url('login/loginNow/')?>">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Correo electronico" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" name="password" placeholder="Contraseña" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                            <?php
                            if ($this->session->flashdata('error')) { ?>
                                <p class="text-danger text-center" style="margin-top: 10px;"> <?=$this->session->flashdata('error')?></p>
                            <?php }
                            ?>
                        </form>
                    </div>
                    </div>
                </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>