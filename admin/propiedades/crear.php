<?php 
    
    require '../../includes/app.php';

    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $propiedad = new Propiedad;

    $vendedores = Vendedor::all();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $propiedad = new Propiedad($_POST['propiedad']);

        // Generar nombre imagen
        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_imagen']['imagen'])->fit(800, 600);
            $propiedad -> setImagen($nombreImagen);
        }

        // Validadiones
        $errores = $propiedad->validar();

       if (empty($errores)) {

            // Guardar imagen
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }

            $image -> save(CARPETA_IMAGENES . $nombreImagen);

            $resultado = $propiedad -> guardar();

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

            <?php include '../../includes/templates/formulario_propiedades.php' ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">

        </form>

    </main>

    <?php 
    
    incluirTemplate('footer');

?>