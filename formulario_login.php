<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
    background-color: #d5f4e6;
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.login-container {
    background-color:  #618685;
    border-radius: 10px;
    padding: 20px;
    width: 300px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.login-header {
    text-align: center;
}

.login-header h1 {
    color: #fff;
    font-size: 24px;
}

.login-form {
    margin-top: 20px;
}

.login-form label {
    color: #fff;
    font-size: 14px;
}

.login-form input {
    width: 90%;
    padding: 10px;
    margin: 5px 0;
    border: none;
    background-color: #ffff;
    border-radius: 5px;
}

.login-form input[type="submit"] {
    background-color: #36486b;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}

.login-form input[type="submit"]:hover {
    background-color: #4040a1;
}
a{
    text-decoration: none;
    color: #ffff;
}
    </style>
</head>
<body>
<div class="login-container">
        <div class="login-header">
            <h1>Inicio Sesion</h1>
        </div>
        <div class="login-form">
            <form action="" method="post">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" placeholder="Tu usuario">

                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Tu contraseña">

                <p>¿No tienes una cuenta? <a href="registracion.php">Regístrate aquí</a></p>
                <input type="submit" name="enviar" value="Iniciar sesión">
            </form>
        </div>
    </div>
    <?php
include_once 'claseConexionBD.php';

if (isset($_POST['enviar'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $BD = new ConectarBD();
        $conn = $BD->getConexion();

        $sql = 'SELECT nombre, rol FROM Usuarios WHERE nombre = :usuario AND contraseña = :contra';  // Selección de 'nombre' y 'rol'

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":usuario", $username);
        $stmt->bindValue(":contra", $password);

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $usuario = $stmt->fetch();  // Obtén los datos del usuario

        if ($usuario) {
            session_start();
            $_SESSION['username'] = $usuario['nombre'];
            $_SESSION['rol'] = $usuario['rol'];  // Asigna el rol del usuario

            header('location: usuarios_registrados.php');
        } else {
            echo "Usuario o contraseña incorrectos.";
        }

        $BD->cerrarConexion();
    }
}
?>


</body>

</html>