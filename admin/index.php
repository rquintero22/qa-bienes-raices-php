<?php 
    // Importar la conexión
    require '../includes/app.php';
  
    estaAutenticado();

    use App\Propiedad;
    use App\Vendedor;

    $propiedades = Propiedad::all();
    $vendedores = Vendedor::all();

    $resultado = $_GET['resultado'] ?? null;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            $tipo = $_POST['tipo'];

            if( validarTipoContenido($tipo)) {

                if ($tipo == 'propiedad') {

                    $propiedad = Propiedad::find($id);

                    $propiedad -> eliminar();

                } else {
                    $vendedor = Vendedor::find($id);

                    $vendedor -> eliminar();
                }

            }

        }
    }
    
    incluirTemplate('header');

?>
    <main class="contenedor seccion">

        <h1>Administrador de Bienes Raíces</h1>

       <?php 
        $mensaje = mostrarNotificaciones(intval($resultado));

        if($mensaje) { ?>
            <p class="alerta exito">
                <?php echo sanitizar($mensaje); ?>
            </p>
        <?php } ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>

        <h2>Propiedades</h2>
        <table class="propiedades">

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>

                </tr>

            </thead>

            <tbody>

                <?php foreach($propiedades  as $propiedad): ?>
                <tr>

                    <td><?php echo $propiedad -> id; ?></td>
                    <td><?php echo $propiedad -> titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad -> imagen; ?>" class="imagen-tabla" /></td>
                    <td><?php echo $propiedad -> precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar" >
                        </form>
                        <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                    </td>

                </tr>

                <?php endforeach; ?>
            </tbody>

        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">

        <thead>

            <tr>

                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($vendedores as $vendedor): ?>
            <tr>

                <td><?php echo $vendedor -> id; ?></td>
                <td><?php echo $vendedor -> nombre . " " . $vendedor -> apellido; ?></td>
                <td><?php echo $vendedor -> telefono; ?></td>
                <td>
                    <form method="POST" class="w-100">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar" >
                    </form>
                    <a class="boton-amarillo-block" href="admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                </td>

            </tr>

            <?php endforeach; ?>
        </tbody>

        </table>
    </main>

    <?php 
    
        incluirTemplate('footer');

    ?>