<?php
include 'conexion.php';  // O require 'conexion.php';

// Ahora puedes usar $conn directamente sin volver a definirlo
$direccion_mac = $conn->real_escape_string($_GET['direccion_mac']);
$latitud = $conn->real_escape_string($_GET['latitud']);
$longitud = $conn->real_escape_string($_GET['longitud']);
$fecha_hora = $conn->real_escape_string($_GET['fecha_hora']);

// Verificar si la MAC ya existe en dispositivos
$sql = "SELECT direccionMac FROM dispositivos WHERE direccionMac = '$direccion_mac'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // Si no existe, insertamos la MAC en dispositivos
    $sql_insert_device = "INSERT INTO dispositivos (direccionMac) VALUES ('$direccion_mac')";
    $conn->query($sql_insert_device);
}

// Insertamos los datos en la tabla datos
$sql_insert_data = "INSERT INTO datos (dispositivoMac, latitud, longitud, fecha_hora) VALUES ('$direccion_mac', $latitud, $longitud, '$fecha_hora')";
$conn->query($sql_insert_data);

header("Location: index.php?pagina=4");
$conn->close();
?>
