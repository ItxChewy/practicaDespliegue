<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            background-color: #d5f4e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .registro-container {
            background-color: #618685;
            border-radius: 10px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .registro-header {
            text-align: center;
        }

        .registro-header h1 {
            color: #fff;
            font-size: 24px;
        }

        .registro-form {
            margin-top: 20px;
        }

        .registro-form label {
            color: #fff;
            font-size: 14px;
        }

        .registro-form input {
            width: 90%;
            padding: 10px;
            margin: 5px 0;
            border: none;
            background-color: #ffff; /* Cambiado a blanco */
            
            border-radius: 5px;
        }

        .registro-form select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: none;
            background-color: #ffff; /* Cambiado a blanco */
         
            border-radius: 5px;
        }

        .registro-form input[type="submit"] {
            background-color: #36486b;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
        }

        .registro-form input[type="submit"]:hover {
            background-color: #4040a1;
        }

        a {
            text-decoration: none;
            color: #fff;
            text-align:center;
        }
    </style>
</head>
<body>
    <div class="registro-container">
        <div class="registro-header">
            <h1>Registro de Usuario</h1>
        </div>
        <div class ="registro-form">
            <form action="registrar_usuario.php" method="post">
                <label for="username">Usuario</label></br>
                <input type="text" id="username" name="username" placeholder="Escribe tu usuario"></br></br>

                <label for="password">Contraseña</label></br>
                <input type="password" id="password" name="password" placeholder="Escribe tu contraseña"></br></br>

                <label for="rol">Rol</label></br>
                <select id="rol" name="rol">
                    <option value="limitado">limitado</option>
                    <option value="administrador">administrador</option>
                </select></br>
                <input type="submit" value="Registrarse">
                <a href="formulario_login.php">Volver al Inicio</a>
            </form>
        </div>
    </div>
</body>
</html>
