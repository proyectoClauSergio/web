<?php
session_start();
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto GPS</title>
</head>
<body>
    <h1>Bienvenido al Proyecto GPS</h1>
    
    <?php if ($pagina == 1) { ?>
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post">
            Usuario: <input type="text" name="usuario" required><br>
            Contraseña: <input type="password" name="password" required><br>
            <button type="submit">Iniciar sesión</button>
        </form>
        <p>¿No tienes cuenta? <a href="index.php?pagina=2">Regístrate aquí</a></p>
    
    <?php } elseif ($pagina == 2) { ?>
        <h2>Registro de Usuario</h2>
        <form action="registro.php" method="post">
            Usuario: <input type="text" name="usuario" required><br>
            Contraseña: <input type="password" name="password" required><br>
            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes cuenta? <a href="index.php?pagina=1">Inicia sesión aquí</a></p>

    <?php } elseif ($pagina == 3 && isset($_SESSION['autentificado'])) { ?>
        <h2>Bienvenido, <?php echo $_SESSION["usuario"]; ?> </h2>
        <p><a href="logout.php">Cerrar sesión</a></p>
    
    <?php } else { 
        header("Location: index.php?pagina=1");
        exit;
    } ?>

</body>
</html>
