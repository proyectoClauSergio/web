<?php
$servername = "localhost";  
$username = "root";       
$password = "12345678";           
$dbname = "proyectogps";   

// Crear conexi�n
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexi�n
if ($conn->connect_error) {
    die("Error de conexi�n: " . $conn->connect_error);
}
?>
