<div class="contenedor-panel">
    <!-- Barra Lateral -->
    <aside class="barra-lateral">
        <div class="marca">
            <h2>Geo<span>Tracker</span></h2>
            <p class="correo-usuario"><?= $_SESSION['usuario'] ?></p>
        </div>

        <nav class="menu-navegacion">
            <a href="index.php?pagina=3" class="enlace-navegacion <?= $pagina_actual == 3 ? 'activo' : '' ?>">
                <i class="fas fa-home"></i> Inicio
            </a>
            <a href="index.php?pagina=4" class="enlace-navegacion <?= $pagina_actual == 4 ? 'activo' : '' ?>">
                <i class="fas fa-table"></i> Datos
            </a>
            <a href="index.php?pagina=6" class="enlace-navegacion <?= $pagina_actual == 6 ? 'activo' : '' ?>">
                <i class="fas fa-map"></i> Mapa
            </a>
            <a href="index.php?pagina=5" class="enlace-navegacion <?= $pagina_actual == 5 ? 'activo' : '' ?>">
                <i class="fas fa-test-tube"></i> Pruebas
            </a>
            <a href="subirdatos.php" class="enlace-navegacion">
                <i class="fas fa-cloud-upload-alt"></i> Subir Datos
            </a>
        </nav>

        <div class="seccion-salir">
            <a href="logout.php" class="boton boton-peligro">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </div>
    </aside>

    <!-- Contenido Principal -->
    <main class="contenido-principal">
        <?php if ($pagina_actual == 3) { ?>
            <!-- Página de Inicio -->
            <div class="seccion-bienvenida animacion-entrada">
                <h1>Bienvenido, <?= $_SESSION['usuario'] ?></h1>
                <p class="texto-destacado">Gestión avanzada de datos geolocalizados</p>

                <div class="tarjetas-caracteristicas">
                    <div class="tarjeta-caracteristica">
                        <i class="fas fa-database icono-grande"></i>
                        <h3>Registros almacenados</h3>
                        <p>Consulta el histórico completo de ubicaciones</p>
                        <a href="index.php?pagina=4" class="boton boton-primario margen-superior">Ver datos</a>
                    </div>

                    <div class="tarjeta-caracteristica">
                        <i class="fas fa-map-marked-alt icono-grande"></i>
                        <h3>Visualización en mapa</h3>
                        <p>Explora los datos geográficos interactivamente</p>
                        <a href="index.php?pagina=6" class="boton boton-primario margen-superior">Abrir mapa</a>
                    </div>
                </div>
            </div>
        <?php } elseif ($pagina_actual == 4) { ?>
            <!-- Tabla de Datos -->
            <div class="tarjeta-metrica animacion-entrada">
                <h3 class="margen-inferior">Registros de Geolocalización</h3>
                <div class="contenedor-tabla">
                    <table class="tabla-datos">
                        <thead>
                            <tr>
                                <th>ID Datos</th>
                                <th>DispositivoMac</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Fecha y Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "conexion.php";
                            $consulta = "SELECT idDatos, dispositivoMac, latitud, longitud, fecha_hora FROM proyectogps.datos";
                            $resultado = $conn->query($consulta);

                            if ($resultado && $resultado->num_rows > 0) {
                                while ($fila = $resultado->fetch_assoc()) {
                                    echo "<tr>
                                                    <td>{$fila['idDatos']}</td>
                                                    <td>{$fila['dispositivoMac']}</td>
                                                    <td>{$fila['latitud']}</td>
                                                    <td>{$fila['longitud']}</td>
                                                    <td>{$fila['fecha_hora']}</td>
                                                </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No hay datos registrados</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } elseif ($pagina_actual == 5) { ?>
            <!-- Pruebas -->
            <div class="tarjeta-metrica animacion-entrada">
                <h3 class="margen-inferior" style="white-space: nowrap;">Pruebas - Coordenadas</h3>
                <br>
                <form action="testing.php" method="get" class="formulario-pruebas" style="white-space: nowrap;">
                    <div>
                        <label class="etiqueta-input">Dirección MAC</label>
                        <input type="text" name="direccion_mac" class="campo-grande"
                            placeholder="Ej: 00:1A:2B:3C:4D:5E" required>
                    </div>

                    <div>
                        <label class="etiqueta-input">Latitud</label>
                        <input type="number" step="0.000001" name="latitud" class="campo-grande"
                            placeholder="Ej: 40.416775" required>
                    </div>

                    <div>
                        <label class="etiqueta-input">Longitud</label>
                        <input type="number" step="0.000001" name="longitud" class="campo-grande"
                            placeholder="Ej: -3.703790" required>
                    </div>

                    <div>
                        <label class="etiqueta-input" style="white-space: nowrap;">Fecha y Hora</label>
                        <input type="datetime-local" name="fecha_hora" class="campo-grande" required>
                    </div>

                    <div>
                        <button type="submit" class="boton boton-primario" style="white-space: nowrap;">
                            Enviar Datos
                        </button>
                    </div>
                    
                </form>


            </div>
        <?php } elseif ($pagina_actual == 6) { ?>
            <!-- Mapa -->
            <div class="tarjeta-metrica animacion-entrada">
                <div class="encabezado-mapa">
                    <h3>Visualización de Datos Geográficos</h3>
                    <div class="controles-mapa">
                        <button class="boton boton-primario">
                            <i class="fas fa-sync-alt"></i> Actualizar
                        </button>
                    </div>
                </div>
                <div class="contenedor-mapa">
                    <div class="placeholder-mapa">
                        <i class="fas fa-map-marked-alt icono-grande"></i>
                        <p>Integración con API de mapas disponible</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
</div>