<?php 
    // Importar la conexión
    require '../includes/config/database.php';
    require '../includes/funciones.php';
    if (isset($_SESSION)) {
        session_start();
    }

    $auth = estaAutenticado();

    if(!$auth) {
        header("location: /");
    }

    
    $db = conectarDB();

    $query = 'SELECT * FROM propiedades';
    $propiedades = mysqli_query($db, $query);

    $resultado = $_GET['resultado'] ?? null;
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            $query = "SELECT imagen FROM propiedades WHERE id={$id}";
            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            unlink("../imagenes/" .$propiedad['imagen']);

            $query = "DELETE FROM propiedades WHERE id={$id}";
            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('Location: /admin?resultado=3');
            }
        }
    }
    
    incluirTemplate('header');

?>
    <main class="contenedor seccion">

        <h1>Administrador de Bienes Raíces</h1>

        <?php if(intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio creado satisfactoriamente</p>
        <?php elseif(intval($resultado) === 2): ?>
            <p class="alerta exito">Anuncio Actualizado satisfactoriamente</p>
        <?php elseif(intval($resultado) === 3): ?>
            <p class="alerta exito">Anuncio Eliminado satisfactoriamente</p>
        <?php endif; ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

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

                <?php while($propiedad = mysqli_fetch_assoc($propiedades)): ?>
                <tr>

                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla" /></td>
                    <td><?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar" >
                        </form>
                        <a class="boton-amarillo-block" href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>">Actualizar</a>
                    </td>

                </tr>

                <?php endwhile; ?>
            </tbody>

        </table>
    </main>

    <?php 
    
        mysqli_close($db);
        incluirTemplate('footer');

    ?>