<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title>Consultas con PDO</title>
 <style>
 body {
    font-family: Arial, sans-serif;
    background-color: #d5f4e6;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h3 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    margin: 20px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

table th {
    background-color:  #618685;
    color: #fff;
    padding: 10px;
    text-align: left;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ccc;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:nth-child(odd) {
    background-color: #fff;
}
table tr:hover{
    background-color:  #405156;
    color:#fff;
}

a{
    text-decoration: none;
    color: black;
}
</style>
 </head>
 <body>
 <h3>Tabla Zapatillas</h3>
 <table border=1>
 <tr><th>Marca</th><th>Modelo</th><th>Talla</th><th>Imagen</th><th>Archivo Binario</th><th>Ver Imagen</th>
 <?php
 include_once 'claseConexionBD.php';
 $BD = new ConectarBD();
 $conn = $BD->getConexion();

 $stmt = $conn->prepare('SELECT * FROM zapatillas');
 $stmt->execute();

 $stmt->setFetchMode(PDO::FETCH_ASSOC);

 while ($zapatillas = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>" . $zapatillas['marca'] . "</td><td>" . $zapatillas['modelo'] . "</td><td>" . $zapatillas['talla'] . "</td><td><img src='img/" . $zapatillas['Imagen'] . "' alt='Imagen 1' height='50px'></td><td><img src='data:image/jpeg;base64," . base64_encode($zapatillas['Nombre_imagen']) . "' height='50px'></td><td><a href='zapatilla/" . $zapatillas['ID'] . "'>Ver Imagen</a></td>";
    echo "</tr>";
}



   $BD->cerrarConexion();
   ?>
    </table>
    <?php
   
        echo '<a href="usuarios_registrados.php">Volver al Inicio</a>';
       
    
    ?>
   
    </body>
   </html>