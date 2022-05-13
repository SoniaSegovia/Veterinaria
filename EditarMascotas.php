<?php
include('Config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: Index.php');
    exit;
}

if(isset($_POST['editar']))
{
    $id = $_GET['EditId'];
    $nombre = $_POST['nombre'];
    $tipoAnimal = $_POST['tipoAnimal'];
    $raza= $_POST['raza'];
    $color = $_POST['color'];
    $sexo = $_POST['sexo'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];

    if($llamado -> Actualizar($id, $nombre, $tipoAnimal, $raza, $color, $sexo, $edad, $peso))
    {
        $mensaje = "<div class='alert alert-success' role='alert'>
                        Registro Se Ha Actualizado!
                    </div>";
    }
    else
    {
        $mensaje = "<div class='alert alert-danger' role='alert'>
                        Operacion Actualizar Ha Fallado!
                    </div>";
    }
}

if (isset($_GET['EditId']))
{
    $Id = $_GET['EditId'];
    $establecer = $conn -> prepare("SELECT * FROM mascotas WHERE idmascotas=?");
    $establecer->execute([$Id]);
    $registro = $establecer -> fetch(PDO::FETCH_OBJ);
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
    <title>Mascotas</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <h3>Editar Mascotas</h3>
                <hr>
                <?php if(isset($mensaje))
                    {
                        echo $mensaje;
                    }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" value="<?php echo $registro->nombre;?>" class="form-control" type="text" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="tipoAnimal">Tipo de Animal:</label>
                        <input id="tipoAnimal" value="<?php echo $registro->tipoAnimal;?>" class="form-control" type="text" name="tipoAnimal">
                    </div>

                    <div class="form-group">
                        <label for="raza">Raza:</label>
                        <input id="raza" value="<?php echo $registro->raza;?>" class="form-control" type="text" name="raza">
                    </div>

                    <div class="form-group">
                        <label for="color
                ">color
                    :</label>
                        <input id="color" value="<?php echo $registro->color
                ;?>" class="form-control" type="text" name="color
                ">
                    </div>
                    
                    <div class="form-group">
                        <label for="sexo">sexo:</label>
                        <input id="sexo" value="<?php echo $registro->sexo;?>" class="form-control" type="text" name="sexo">
                    </div>

                    <div class="form-group">
                        <label for="edad">edad:</label>
                        <input id="edad" value="<?php echo $registro->edad;?>" class="form-control" type="text" name="edad">
                    </div>

                    <div class="form-group">
                        <label for="peso">peso:</label>
                        <input id="peso" value="<?php echo $registro->peso;?>" class="form-control" type="text" name="peso">
                    </div>

                    <br>

                    <div class="d-grid gap-1 col-6 mx-auto">
                        <button class="btn btn-primary" name="editar" type="submit">Guardar</button>
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