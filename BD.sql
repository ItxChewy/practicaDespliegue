CREATE TABLE usuarios (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) ,
    contraseña VARCHAR(50) ,
    rol VARCHAR(50)
);
CREATE TABLE zapatillas(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(50) ,
    modelo VARCHAR(50),
    talla INT,
    Imagen VARCHAR(50),
    Nombre_imagen BLOB
    
);