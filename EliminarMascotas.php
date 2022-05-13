<?php
include ('Config.php');

if(isset($_POST['eliminar']))
{
    $Id = $_GET['ElimId'];

    if($llamado -> Eliminar($Id))
    {
        $mensaje = "<div class='alert alert-success' role='alert'>
                        Registro Se Ha Eliminado!
                        <br>
                        <a class='btn btn-secondary' href='MostrarMascotas.php' type='submit'>Volver</a>
                    </div>";
    }
    else
    {
        $mensaje = "<div class='alert alert-danger' role='alert'>
                        Operacion Eliminar Ha Fallado!
                        <br>
                        <a class='btn btn-secondary' href='MostrarMascotas.php' type='submit'>Volver</a>
                    </div>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php require_once "Menu.php" ?>
    <title>Eliminar Mascota</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <?php
            if(isset($mensaje))
            {
                echo $mensaje;
            }
            ?>
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Eliminar Mascota</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="label1"> Esta Seguro Que Desea Eliminar Esta Mascota.</label>
                    </div>

                    <br>

                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a class="btn btn-secondary" href="MostrarMascotas.php" type="submit">Cancelar</a>
                        <button class="btn btn-primary" name="eliminar" type="submit">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>