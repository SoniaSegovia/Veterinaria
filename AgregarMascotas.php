<?php
include('Config.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: Index.php');
    exit;
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
                <h3>Nueva Mascota</h3>
                <hr>
                <?php
                    if (isset($_POST['agregar'])) 
                    {
                        $nombre = $_POST['nombre'];
                        $tipoAnimal = $_POST['tipoAnimal'];
                        $raza = $_POST['raza'];
                        $color = $_POST['color'];
                        $sexo = $_POST['sexo'];
                        $edad = $_POST['edad'];
                        $peso = $_POST['peso'];

                        $query = $conn->prepare("INSERT INTO mascotas (nombre, tipoAnimal, raza, color, sexo, edad, peso) 
                        VALUES (:nombre, :tipoAnimal, :raza, :color, :sexo, :edad, :peso)");
                        $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
                        $query->bindParam("tipoAnimal", $tipoAnimal, PDO::PARAM_STR);
                        $query->bindParam("raza", $raza, PDO::PARAM_STR);
                        $query->bindParam("color", $color, PDO::PARAM_STR);
                        $query->bindParam("sexo", $sexo, PDO::PARAM_STR);
                        $query->bindParam("edad", $edad, PDO::PARAM_STR);
                        $query->bindParam("peso", $peso, PDO::PARAM_STR);
                        $result = $query->execute();

                        if ($result) 
                        {
                            echo '<div class="alert alert-success" role="alert">Tu registro fue exitoso!</div>';
                        } 
                        else 
                        {
                            echo '<div class="alert alert-danger" role="alert">¡Algo salió mal!</div>';
                        }
                    }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input id="nombre" class="form-control" type="text" name="nombre">
                    </div>

                    <div class="form-group">
                        <label for="tipoAnimal">Tipo de Animal:</label>
                        <input id="tipoAnimal" class="form-control" type="text" name="tipoAnimal">
                    </div>

                    <div class="form-group">
                        <label for="raza">Raza:</label>
                        <input id="raza" class="form-control" type="text" name="raza">
                    </div>

                    <div class="form-group">
                        <label for="color">Color:</label>
                        <input id="color" class="form-control" type="text" name="color">
                    </div>
                    
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <input id="sexo" class="form-control" type="text" name="sexo">
                    </div>

                    <div class="form-group">
                        <label for="edad">Edad:</label>
                        <input id="edad" class="form-control" type="text" name="edad">
                    </div>

                    <div class="form-group">
                        <label for="peso">Peso:</label>
                        <input id="peso" class="form-control" type="text" name="peso">
                    </div>

                    <br>

                    <div class="d-grid gap-1 col-6 mx-auto">
                        <button class="btn btn-primary" name="agregar" type="submit">Guardar</button>
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