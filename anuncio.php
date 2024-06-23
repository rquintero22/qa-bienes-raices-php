<?php 

    require 'includes/funciones.php';
    // importar conexion a base de datos
    require 'includes/config/database.php';
      
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /');
    }

    incluirTemplate('header');

     $db = conectarDB();
     // consultar
     $query = "SELECT * FROM propiedades WHERE id = {$id}";
   
     // Obtener resultado
     $resultado = mysqli_query($db, $query);
     if(!$resultado -> num_rows) {
        header('Location: 7');
     }
     $propiedad = mysqli_fetch_assoc($resultado);

?>

<main class="contenedor seccion contenido-centrado">

    <h1><?php echo $propiedad['titulo']; ?></h1>

     <img loading="lazy" src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen destacada">

    <div class="resumen-propiedad">

        <p class="precio">$<?php echo $propiedad['precio']; ?></p>

        <ul class="iconos-caracteristicas">

            <li>

                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">

                <p><?php echo $propiedad['wc']; ?></p>

            </li>

            <li>

                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">

                <p><?php echo $propiedad['estacionamiento']; ?></p>

            </li>

            <li>

                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">

                <p><?php echo $propiedad['habitaciones']; ?></p>

            </li>

        </ul>

        <p>
        <?php echo $propiedad['descripcion']; ?>
        </p>

    </div>

</main>

<?php 
    incluirTemplate('footer');
    mysqli_close($db);

?>