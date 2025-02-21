<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "proyectogps";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$password')";
if (mysqli_query($conn, $sql)) {
    header("Location: index.php?pagina=1");
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
