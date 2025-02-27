<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "proyectogps";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$password = $_POST['password'];

$sql = "SELECT usuario, contraseña FROM usuarios WHERE usuario = '$usuario'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['contraseña'])) {
        $_SESSION["autentificado"] = 1;
        $_SESSION["usuario"] = $usuario;
        header("Location: index.php?pagina=3");
        exit;
    }
}

session_destroy();
header("Location: index.php?pagina=1");
exit;
?>
