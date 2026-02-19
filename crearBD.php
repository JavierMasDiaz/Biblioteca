// crearBD.php
<?php
$servername = "db";
$username = "root";
$password = "";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS Biblioteca CHARACTER SET utf8 COLLATE utf8_spanish_ci";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada exitosamente";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Seleccionar la base de datos
$conn->select_db("Biblioteca");

// Crear tabla
$sql = "CREATE TABLE IF NOT EXISTS Libro (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50) NOT NULL,
    autor VARCHAR(50) NOT NULL,
    editorial VARCHAR(25) NOT NULL,
    genero ENUM('Drama', 'Ciencia Ficcion', 'Intriga', 'Otros') NOT NULL,
    paginas INT,
    fechaLanzamiento DATE,
    precio DECIMAL(5,2)
) CHARACTER SET utf8 COLLATE utf8_spanish_ci";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'Libro' creada exitosamente.";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

// Insertar datos
$sql = "INSERT INTO Libro (titulo, autor, editorial, genero, paginas, fechaLanzamiento, precio) VALUES
    ('La historia interminable', 'Michael Ende', 'Alfaguara', 'Ciencia Ficcion', 496, NULL, 15.15),
    ('Un mundo feliz', 'Aldous Huxley', 'Debolsillo', 'Otros', 256, NULL, 9.45),
    ('Filosofía en viñetas', 'M. F. Patton', 'Debolsillo', 'Otros', 176, NULL, 14.20)";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados exitosamente.";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

$conn->close();
?>
