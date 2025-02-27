<div class="contenedor-autenticacion">
    <div class="tarjeta-autenticacion animacion-entrada">
        <div class="encabezado-autenticacion">
            <svg class="logo-autenticacion" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M24 44C35.0457 44 44 35.0457 44 24C44 12.9543 35.0457 4 24 4C12.9543 4 4 12.9543 4 24C4 35.0457 12.9543 44 24 44Z"
                    fill="var(--color-primario)" />
                <path d="M30 18L22 30L18 26" stroke="white" stroke-width="3" stroke-linecap="round" />
            </svg>
            <h1>GeoTracker Pro</h1>
            <p class="texto-secundario">
                <?= $pagina_actual == 1 ? 'Inicia sesión para continuar' : 'Crea una cuenta nueva' ?></p>
        </div>

        <form action="<?= $pagina_actual == 1 ? 'login.php' : 'registro.php' ?>" method="post">
            <div class="grupo-input">
                <label class="etiqueta-input" for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" class="campo-input" placeholder="Ingresa tu usuario"
                    required>
            </div>

            <div class="grupo-input">
                <label class="etiqueta-input" for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="campo-input" placeholder="••••••••"
                    required>
            </div>

            <button type="submit" class="boton boton-primario ancho-completo">
                <?= $pagina_actual == 1 ? 'Iniciar Sesión' : 'Registrarse' ?>
            </button>
        </form>

        <p class="texto-centrado margen-superior">
            <?= $pagina_actual == 1
                ? '¿No tienes cuenta? <a href="index.php?pagina=2" class="enlace-primario">Regístrate</a>'
                : '¿Ya tienes cuenta? <a href="index.php?pagina=1" class="enlace-primario">Inicia Sesión</a>' ?>
        </p>
    </div>
</div>