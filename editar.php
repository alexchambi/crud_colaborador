<?php
    include("database.php");

    if (isset($_GET['id'])){
        $cod = $_GET['id'];

        $query = "SELECT *FROM colaborador WHERE cod = $cod";
        $resultado = mysqli_query($conn, $query);

        if(mysqli_num_rows($resultado) == 1){
            #echo "SI se puede";

            $row = mysqli_fetch_array($resultado);
            
            $cod = $row['cod'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $email = $row['email'];
            $genero = $row['genero'];
            $fecha_nac= $row['fecha_nac'];
            $dni = $row['dni'];
            $telefono = $row['telefono'];
            $direccion = $row['direccion'];

            #echo $nombre;
        }
    }

    if (isset($_POST["actualizar"])){
        $cod = $_GET["id"];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $genero = $_POST['genero'];
        $fecha_nac = $_POST['fecha_nac'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        /*
        echo $nombre;
        echo $apellido;
        echo $email;
        echo $genero;
        echo $fecha_nac;
        echo $dni;
        echo $telefono;
        echo $direccion;
        */

        $query = "UPDATE colaborador set nombre='$nombre', apellido='$apellido', email='$email', genero='$genero',fecha_nac='$fecha_nac',
        dni='$dni', telefono='$telefono', direccion='$direccion' WHERE cod = $cod";

        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Editado';
        $_SESSION['message_type'] = 'info';

        header("Location: index.php");
    }


?>

<?php include("header.php");?>

<div class="container">
<div class="col-md-4 mx-auto">

            <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
                <div class="md-3">
                    <label class="form-label">Nombres:</label>
                    <input type="text" class="form-control sm" name="nombre" value="<?php echo $nombre;?>">
                </div>
                <div class="md-3">
                    <label class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellido" value="<?php echo $apellido;?>">
                </div>
                <div class="md-3">
                    <label class="form-label">Correo:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
                <div class="md-3">
                    <label class="form-label">Genero:</label>
                    <select class="form-control" name = "genero">
                        <option><?php echo $genero;?></option>
                        <option><?php if($genero=='Masculino'){
                                echo 'Femenino';
                        }
                        else{
                            echo 'Masculino';
                        }
                                        ?></option>
                    </select>
                </div>
                <div class="md-3">
                    <label class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" name="fecha_nac" value="<?php echo $fecha_nac;?>">
                </div>
                <div class="md-3">
                    <label class="form-label">DNI:</label>
                    <input type="text" class="form-control" name="dni" value="<?php echo $dni;?>">
                </div>
                <div class="md-3">
                    <label class="form-label">Telefono:</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $telefono;?>">
                </div>
                <div class="md-3">
                    <label class="form-label">Direccion:</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $direccion;?>">
                </div>
                
                <button type="submit" name="actualizar"class="btn btn-info">Actualizar</button>

            </form>
    </div>
</div>



<?php include("header.php");?>