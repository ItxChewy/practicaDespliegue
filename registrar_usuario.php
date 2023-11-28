<?php
try {
    $base = new PDO("mysql:host=localhost; dbname=proyecto", "root", "");
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $username = htmlentities(addslashes($_POST['username']));
    $password = htmlentities(addslashes($_POST['password'])); 
    $rol = $_POST['rol'];

    // Verificar si el usuario ya existe
    $sql = "SELECT ID FROM usuarios WHERE nombre=:username";
    $resultado = $base->prepare($sql);
    $resultado->bindValue(":username", $username);
    $resultado->execute();

    if ($resultado->rowCount() == 0) {
        // El usuario no existe, insertar el nuevo usuario
        $sql = "INSERT INTO usuarios (nombre, contraseña, rol) VALUES (:username, :contrasenia, :rol)";
        $resultado = $base->prepare($sql);
        $resultado->bindValue(":username", $username);
        $resultado->bindValue(":contrasenia", $password);
        $resultado->bindValue(":rol", $rol);
        $resultado->execute();

        header("location: formulario_login.php"); 
    } else {
        echo "El nombre de usuario ya existe. Por favor, elige otro nombre de usuario.";
    }
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
