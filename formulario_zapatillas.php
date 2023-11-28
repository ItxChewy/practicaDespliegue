<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario zapatillas</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #d5f4e6;
    text-align: center;
    margin: 0;
    display:flex;
    flex-direction:column;
    }

.container {
    background-color:  #618685;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    padding: 20px;
    width: 50%;
}

h1 {
    font-size: 24px;
    color: #fff;
}

form {
    margin: 20px 0;
}

label {
    display: block;
    font-weight: bold;
    color: #fff;
    margin-bottom: 8px;
}

input[type="text"], input[type="file"], select {
    width: 70%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="file"] {
    border: none;
}

select {
    height: 40px;
}

.file-input-label {
    background-color: #f8f8f8;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 10px;
}

input[type="submit"] {
    background-color:  #405156;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    font-size: 16px;
    padding: 10px 20px;
}

input[type="submit"]:hover {
    background-color: #0077a8;
}

a{
    text-decoration:none;
    color:  #405156;
}
</style>
</head>
<body>
    <div class="container">
        <h1>Inserta una Zapatilla</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="marca">Marca</label>
            <input type="text" id="marca" name="marca">

            <label for="modelo">Modelo</label>
            <input type="text" id="modelo" name="modelo">

            <label for="talla">Talla</label>
            <select id="talla" name="talla">
                <option value="36">36</option>
                <option value="37">37</option>
                <option value="38">38</option>
                <option value="39">39</option>
                <option value="40" selected>40</option>
                <option value="41">41</option>
                <option value="42">42</option>
                <option value="43">43</option>
                <option value="44">44</option>
                <option value="45">45</option>
                <option value="46">46</option>
            </select>

            <label for="imagen">Foto </label>
            <input type="file" id="imagen" name="imagen" accept="image/*">
    

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </div> 
    
   
       <a href="usuarios_registrados.php">Volver al Inicio</a>
       
    
    <?php
    include_once 'claseConexionBD.php';

    if(isset($_POST['enviar'])){
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $talla = $_POST['talla'];
        $imagen = $_FILES['imagen']['name']; 

        if (empty($marca) || empty($modelo) || empty($talla) || empty($imagen)) {
            die("No se pueden dejar campos vacíos.");
        } else {
            // Resto del código para manejar la imagen y la inserción en la base de datos
            if ( is_uploaded_file($_FILES['imagen']['tmp_name']) ) {
                // Resto del código para manejar la imagen
            } else {
                die("No se ha podido subir el fichero.");
            }
        }
        if(!empty($marca) && !empty($modelo) && !empty($talla) && !empty($imagen)){
        if ( is_uploaded_file($_FILES['imagen']['tmp_name']) ) {  
              $nombreDirectorio = "img/";  
              $nombreFichero = $_FILES['imagen']['name'];  
              $tipo = $_FILES['imagen']['type'];  
              
              if ($tipo !='image/x-png' && $tipo != 'image/jpeg') 
                 $err = "Archivo " . $_FILES['imagen']['name'] . " no es una imagen";
              else  
              {    
                if ( is_dir($nombreDirectorio) ) {  
                   $nombreCompleto = $nombreDirectorio.$nombreFichero; 
                   move_uploaded_file($_FILES['imagen']['tmp_name'], $nombreCompleto);
                   $err = 'El archivo subido está disponible en <a href="./img/'.
                       $nombreFichero.'">'.$nombreFichero.'</a>';
                }
                else 
                   $err = 'Directorio definitivo inválido';
              }
            }
            else
              $err = "No se ha podido subir el fichero<br/>";
        
        if(!empty($marca) && !empty($modelo) && !empty($talla) && !empty($imagen)){
            
           $imgblob = $nombreCompleto;
            $BD = new ConectarBD();
            $conn = $BD->getConexion();
            $fp = fopen($imgblob, 'rb');

            $sql = 'INSERT INTO zapatillas (marca, modelo, talla, Imagen, Nombre_imagen) VALUES (:marca, :modelo, :talla, :imagen, :nombre_imagen)';
            
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':talla', $talla);
            $stmt->bindParam(':imagen', $imagen);

            $stmt->bindParam(':nombre_imagen', $fp, PDO::PARAM_LOB);

            
            if($stmt->execute()){
             
                header('location: usuarios_registrados.php');
            } else {
                
                echo "Error al insertar los datos en la base de datos.";
            }

            $BD->cerrarConexion();
        }
    }
    }
    ?>
</body>
</html>