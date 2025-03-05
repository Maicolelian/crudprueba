<?php $this->load->view('includes/header'); ?>

    <div class="container">

        <div class="row">
            <div class="card"  style="background-color:rgb(195, 227, 230);">
                <div class="card-body">
                    <div class="container d-flex justify-content-end">
                        <a href="<?=base_url()?>login/logout" class="btn btn-sm btn-dark">Cerrar sesion</a>
                    </div> <br>
                    <h5 class="card-title text-center" style="background-color: #f5f5dc;">Empleados</h5>
                    <div>
                        <a href="<?=base_url()?>user/add" class="btn btn-sm btn-success">Nuevo registro</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Fecha de nacimiento</th>
                                <th>Departamento</th>
                                <th>fecha de contatacion</th>
                                <th>Rol</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($users as $row) { ?>
                            <tr>
                                <td><?=$i++?></td>
                                <td><?=$row['firstname']?></td>
                                <td><?=$row['lastname']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['date_birth']?></td>
                                <td><?=$row['id_department']?></td>
                                <td><?=$row['date_contract']?></td>
                                <td><?=$row['id_rol']?></td>
                                <td>
                                    <a href="<?=base_url()?>user/edit/<?=$row['id']?>" class="btn btn-sm btn-primary">Editar</a>
                                    <a href="<?=base_url()?>user/delete/<?=$row['id']?>" onclick="return confirm('Estas seguro que quieres eliminar este registro?')" class="btn btn-sm btn-danger">Borrar</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                    <?php
                    if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success" role="alert">
                            Agregado correctamente!
                        </div>
                    <?php }
                    ?>
                    <?php
                    if ($this->session->flashdata('deleted')) { ?>
                        <div class="alert alert-success" role="alert">
                            Eliminado correctamente!
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