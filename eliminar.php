<?php
    include("database.php");

    if (isset($_GET['id'])){
        $cod = $_GET['id'];

        $query = "DELETE FROM colaborador WHERE cod = $cod";
        $resultado = mysqli_query($conn, $query);

        if(!$resultado){
            echo "Error";
            die("Error");
        }

        $_SESSION['alerta'] = 'Eliminado';
        $_SESSION['tipo_alerta'] = 'danger';
        header("Location: index.php");
    }
?>