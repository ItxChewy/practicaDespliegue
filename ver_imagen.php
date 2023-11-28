<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagen</title>
    <style>
        body{
            background-color: #d5f4e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction:column;
        }
        h3{
            color:#405156;
        }

        #centered-div {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        #outside-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        a{
            text-decoration:none;
            color:  #405156;
        }
    </style>
</head>
<body>
<?php
include_once 'claseConexionBD.php';

if (isset($_GET['id'])) {
    $zapatilla_id = $_GET['id'];
    
    $BD = new ConectarBD();
    $conn = $BD->getConexion();

    $stmt = $conn->prepare('SELECT * FROM zapatillas WHERE id = :id');
    $stmt->bindParam(':id', $zapatilla_id);
    $stmt->execute();
    $zapatilla = $stmt->fetch();

    if ($zapatilla) {
        echo "<div id='centered-div'>";
        echo "<h3>Imagen de Zapatilla</h3>";
        echo "<img src='data:image/jpeg;base64," . base64_encode($zapatilla['Nombre_imagen']) . "' height='300px'>";
        echo "</div>";
        
        echo "<a id='outside-link' href='tabla_zapatillas.php' >Volver a la tabla</a>";
    } else {
        echo "Zapatilla no encontrada";
    }

    $BD->cerrarConexion();
}
?>
</body>
</html>


