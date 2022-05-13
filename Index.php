<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="vh-100 row m-0 align-items-center justify-content-center">
        <div class="col-auto p-5 bg-white shadow-lg rounded">
            <div class="container">
                <h3 class="text-center">Iniciar Sesion</h3>
                <hr>
                <?php
                    include('Config.php');
                    session_start();

                    if(isset($_POST['login']))
                    {
                        $username = $_POST['usuario'];
                        $password = $_POST['password'];

                        $query = $conn->prepare("SELECT * FROM usuarios WHERE username = :username");
                        $query->bindParam("username", $username, PDO::PARAM_STR);
                        $query->execute();

                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        if (!$result) 
                        {
                            header("location: Index.php");
                            echo '<div class="alert alert-danger" role="alert">Usuario No Existe!</div>';
                        } 
                        else 
                        {
                            if (password_verify($password, $result['password'])) 
                            {
                                $_SESSION['user_id'] = $result['id'];
                                header("location: Principal.php");
                                echo '<div class="alert alert-success" role="alert">Accediste Al Sistemas!</div>';
                            } 
                            else 
                            {
                                header("location: Index.php");
                                echo '<div class="alert alert-warning" role="alert">Usuario Existe Pero La Contraseña Esta Mal!</div>';
                            }
                        }
                    }
                ?>

                <form method="post">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </div>

                

                    <div class="d-grid gap-2 d-md-block text-center">
                        <a class="btn btn-secondary col-8" href="NuevoUsuario.php">Registrarse</a>
                        <button class="btn btn-primary col-8" name="login" type="submit">Ingresar</button>
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