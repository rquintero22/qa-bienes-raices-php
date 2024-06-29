<?php 

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;
    
    require '../../includes/app.php';

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    estaAutenticado();

    if (!$id) {
        header('Location: /admin');
    }

    // Consulta propiedad
    $propiedad = Propiedad::find($id);

    // Consulta de vendedores
    $vendedores = Vendedor::all();

    // Validadiones
    $errores = Propiedad::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $args = $_POST['propiedad'];
         
        $propiedad -> sincronizar($args);
      
        $errores = $propiedad -> validar();

        // Generar nombre imagen
        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';
            
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_imagen']['imagen'])->fit(800, 600);
            $propiedad -> setImagen($nombreImagen);
        }

       if (empty($errores)) {

        if ($_FILES['propiedad']['tmp_name']['imagen']) {

            $image->save(CARPETA_IMAGENES . $nombreImagen);

        }

        $propiedad -> guardar();

       }

       
    }

    incluirTemplate('header');

?>
    <main class="contenedor seccion">

        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" 
                enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>

    </main>

    <?php 
    
    incluirTemplate('footer');

?>