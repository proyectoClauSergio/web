<?php
session_start();
$pagina_actual = isset($_GET['pagina']) ? intval($_GET['pagina']) : 1;
?>
<!DOCTYPE html>
<html lang="es" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoTracker Pro</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php if ($pagina_actual == 1 || $pagina_actual == 2) { ?>
        <!-- Páginas de Autenticación -->
        <?php include 'login_regristro.php'; ?>

    <?php } elseif (($pagina_actual >= 3 && $pagina_actual <= 6) && isset($_SESSION['autentificado'])) { ?>
        <!-- Panel de Control -->
        <?php include 'paginaPrincipal.php'; ?>
    <?php } ?>
</body>

</html>