<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Registrados</title>
    <style> 
body {
    font-family: Arial, sans-serif;
    background-color: #d5f4e6;
    margin: 0;
    padding: 0;
}

header {
    background-color: #405156;
    color: #fff;
    text-align: center;
    padding: 20px;
}


nav {
    background-color: #36486b;
    color: #fff;
    text-align: center;
    padding: 10px;
}

main {
    background-color: #d5f4e6;
    text-align: center;
    padding: 20px;
    margin-top: 50px;
}

a {
    display: inline-block; 
    margin-right: 10px;    
    font-size: 18px;
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <?php
        session_start();

        if(!isset($_SESSION['username'])){
            header("location:formulario_login.php");
        }
    ?>
    <header>
    <h1>Bienvenido <?php echo strtoupper($_SESSION['username']) . "<br>"; ?> </h1>
    </header>
    
    <nav>
    <p>Sesion iniciciada como <?php echo $_SESSION['rol']."</br>"; ?> </p>
    </nav>
    <main>
    <?php
    if(isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador') {
        echo '<a href="formulario_zapatillas.php">Insertar Zapatilla</a>';
       
    }
    ?>
    <a href="tabla_zapatillas.php">Ver Tabla de Zapatillas</a>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</main>


    
</body>
</html>