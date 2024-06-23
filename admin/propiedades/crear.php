<?php 
    
    require '../../includes/config/database.php';
    require '../../includes/funciones.php';
    
    $db = conectarDB();

    // Consulta de vendedores
    $consulta  = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    // Validadiones
    $errores = [];
    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $banos = '';
    $estacionamiento = '';
    $vendedorId = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo '<pre>';
        // var_dump($_POST) ;
        // echo '</pre>';

        // echo '<pre>';
        // var_dump($_FILES) ;
        // echo '</pre>';

        // exit();
        $titulo = mysqli_real_escape_string($db, $_POST['txtTitulo']);
        $precio = mysqli_real_escape_string($db, $_POST['txtPrecio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['txtDescripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['txtHabitaciones']);
        $banos = mysqli_real_escape_string($db, $_POST['txtBanos']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['txtEstacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['selVendedor']);
        $creado = date('Y/m/d');

        // Asignar file hacia variable
        $imagen = $_FILES['txtImagen'];

        if (!$titulo) {
            $errores[] = "Debes añadir un título";
        }

        if (!$precio) {
            $errores[] = "El precio es requerido";
        }

        if (strlen($descripcion) < 50 ) {
            $errores[] = "La descripción es requerida y debe contener al menos 50 caracteres";
        }

        if (!$habitaciones) {
            $errores[] = "El número de habitaciones es requerida";
        }

        if (!$banos) {
            $errores[] = "El número de baños es requerido";
        }

        if (!$estacionamiento) {
            $errores[] = "El número de estacionamientos es requerido";
        }

        if (!$vendedorId) {
            $errores[] = "Debes seleccionar un vendedor";
        }

        if(!$imagen['name']){
            $errores[] = 'La imagen es requerida';
        }

        if(!$imagen['name'] || $imagen['error']){
            $errores[] = 'La imagen es requerida';
        }

        // Validar por tamaño (1MB máximo)
        $medida = 1000 * 1000;
        if(!$imagen['size'] > $medida){
            $errores[] = 'La imagen debe ser menor a $medida MB';
        }


       if (empty($errores)) {

            // Carpetas
            $carpetaImagenes = '../../imagenes/';
            if(!is_dir($carpetaImagenes)){
                mkdir($carpetaImagenes);
            }

            // Generar nombre imagen
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            // Guardar imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            // Insertar en base de datos
            $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, vendedorId, creado, imagen)";
            $query = $query . " VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$banos', '$estacionamiento', '$vendedorId', '$creado', '$nombreImagen')";
            echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
               header('Location: /admin?resultado=1');
            }
       }

       
    }

    incluirTemplate('header');

?>
    <main class="contenedor seccion">

        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" 
                action="/admin/propiedades/crear.php"
                enctype="multipart/form-data">

            <fieldset>

                <legend>Información General</legend>

                <label for="txtTitulo">Titulo:</label>

                <input type="text" 
                       name="txtTitulo" 
                       id="txtTitulo" 
                       placeholder="Título de la propiedad"
                       value="<?php echo $titulo ?>" />

                <label for="txtPrecio">Precio:</label>

                <input type="number" 
                        name="txtPrecio" 
                        id="txtPrecio" 
                        placeholder="Precio de la propiedad"
                        value="<?php echo $precio ?>" />

                <label for="txtImagen">Imagen:</label>

                <input type="file" 
                        name="txtImagen" 
                        id="txtImagen" 
                        accept="image/jpeg, image/png"
                         />

                <label for="txtDescripcion">Descripción:</label>

                <textarea id="txtDescripcion" 
                            name="txtDescripcion"
                            ><?php echo $descripcion ?></textarea>

            </fieldset>

            <fieldset>

                <legend>Información Propiedad</legend>

                <label for="txtHabitaciones">Habitaciones:</label>

                <input type="number" 
                        name="txtHabitaciones" 
                        id="txtHabitaciones" 
                        placeholder="Ej. 3" 
                        min="1" 
                        max="100"
                        value="<?php echo $titulo ?>" />

                <label for="txtBanos">Baños:</label>

                <input type="number" 
                        name="txtBanos" 
                        id="txtBanos" 
                        placeholder="Ej. 3" 
                        min="1" 
                        max="100"
                        value="<?php echo $banos ?>" />

                <label for="txtEstacionamiento">Estacionamiento:</label>

                <input type="number" 
                        name="txtEstacionamiento" 
                        id="txtEstacionamiento" 
                        placeholder="Ej. 3" 
                        min="1" 
                        max="100"
                        value="<?php echo $estacionamiento ?>" />

            </fieldset>

            <fieldset>

                <legend>Vendedor</legend>

                <select id="selVendedor"
                        name="selVendedor">
                    <option value="" selected>-- Seleccione un Vendedor --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selec ted' : ''; ?> 
                                value="<?php echo $vendedor['id'] ?>"><?php echo $vendedor["nombre"] . " " . $vendedor["apellido"] ?></option>
                    <?php endwhile; ?>
                </select>

            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">

        </form>

    </main>

    <?php 
    
    incluirTemplate('footer');

?>