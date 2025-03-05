<?php $this->load->view('includes/header'); ?>

    <div class="container">

        <div class="row">
            <div class="card"  style="background-color:rgb(174, 219, 224);">
                <div class="card-body">
                    <h5 class="card-title text-center" style="background-color: #f5f5dc;">Informacion</h5>
                    <form class="row g-3" method="post" action="<?=base_url()?>user/add">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">Nombre</label>
                            <input type="text" name="firstname" placeholder="Nombre" class="form-control" id="firstname">
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Apellido</label>
                            <input type="text" name="lastname" placeholder="Apellido" class="form-control" id="lastname">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo electronico</label>
                            <input type="text" name="email" placeholder="Correo electronico" class="form-control" id="email">
                        </div>
                        <div class="col-md-6">
                            <label for="date_birth" class="form-label">Fecha de nacimiento</label>
                            <input type="date" name="date_birth" placeholder="Fecha de nacimiento" class="form-control" id="date_birth">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="department" class="form-label">Departamento</label>
                            <select id="department" name="department" class="form-select">
                                <option selected>Selecciona un departamento</option>
                                <option value="1">Antioquia</option>
                                <option value="2">Bolivar</option>
                                <option value="3">Cesar</option>
                                <option value="4">Boyaca</option>
                                <option value="5">Choco</option>
                                <option value="6">Nariño</option>
                            </select>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="date_contract" class="form-label">Fecha de contratacion</label>
                            <input type="date" name="date_contract" placeholder="Fecha de contratacion" class="form-control" id="date_contract">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="rol" class="form-label">Rol</label>
                            <select id="rol" name="rol" class="form-select">
                                <option selected>Selecciona un rol para el empleado</option>
                                <option value="1">Administrador</option>
                                <option value="2">empleado</option>
                            </select>
                        </div>
                        <div>
                            <a href="<?=base_url()?>user/index" class="btn btn-sm btn-dark">Volver</a>
                            <i class="bi bi-arrow-left"></i>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3 col-2">Guardar</button>
                    </form>
                    <?php
                    if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            Agregado correctamente!
                        </div>
                    <?php }
                    ?>
                    <?php
                    if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert">
                            Error!
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('includes/footer'); ?>