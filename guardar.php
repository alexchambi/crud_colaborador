<?php
    include("database.php");
    if(isset($_POST['guardar'])){
        #echo "\n guardando";
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $genero = $_POST['genero'];
        $fecha_nac = $_POST['fecha_nac'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        /*echo $nombre;
        echo $apellido;
        echo $email;
        echo $genero;
        echo $fecha_nac;
        echo $dni;
        echo $telefono;
        echo $direccion;
        */
        $query = "INSERT INTO colaborador(nombre, apellido, email, genero, fecha_nac, dni, telefono, direccion)
        VALUES('$nombre','$apellido','$email','$genero','$fecha_nac','$dni','$telefono','$direccion')";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Error");
        }

        #echo("Correcto");

        $_SESSION['alerta'] = 'Registro correcto';
        $_SESSION['tipo_alerta'] = 'success';

        header("Location: index.php");
        
    }
?>