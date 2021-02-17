<?php include("database.php") ?>

<?php include("header.php") ?>
<div class="container">

    <div class="row">
        <div class="col-md-2">

            <?php
                if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php session_unset();} ?>

            <form action="guardar.php" method="POST">
                <div class="md-3">
                    <label class="form-label">Nombres:</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="md-3">
                    <label class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellido">
                </div>
                <div class="md-3">
                    <label class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="md-3">
                    <label class="form-label">Genero:</label>
                    <select class="form-control" name = "genero">
                        <option>Masculino</option>
                        <option>Femenino</option>
                    </select>
                </div>


                <div class="md-3">
                    <label class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="fecha_nac">
                </div>
                <div class="md-3">
                    <label class="form-label">DNI:</label>
                    <input type="text" class="form-control" name="dni">
                </div>
                <div class="md-3">
                    <label class="form-label">Telefono:</label>
                    <input type="text" class="form-control" name="telefono">
                </div>
                <div class="md-3">
                    <label class="form-label">Direccion:</label>
                    <input type="text" class="form-control" name="direccion">
                </div>
                
                <button type="submit" name="guardar"class="btn btn-success">Registrar</button>
            </form>

        </div>
        <div class="col-md-10">
            <h3>Lista de Colaboradores</h3>
            <table class="table table-sm table-bordered table-responsive table-hover">
                <thead class="thead-dark mx-auto">
                    <tr>
                        <th>ID</th>
                        <th>Nombre(s)</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Genero</th>
                        <th>Fec. Nacimiento</th>
                        <th>N° DNI</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th></th>
                    </tr>
                <thead>
                <tbody>
                    <?php
                        $query = "SELECT *FROM colaborador";
                        $datos = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($datos)){ ?>
                            <tr>
                                <td><?php echo $row['cod'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['apellido'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['genero'] ?></td>
                                <td><?php echo $row['fecha_nac'] ?></td>
                                <td><?php echo $row['dni'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td><?php echo $row['direccion'] ?></td>
                                <td>
                                    <a href="editar.php?id=<?php echo $row['cod'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="eliminar.php?id=<?php echo $row['cod'] ?>" class="btn btn-sm btn-danger">Eliminar</a> 
                                </td>
                            </tr>
                     <?php } ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
    

<?php include("footer.php") ?>