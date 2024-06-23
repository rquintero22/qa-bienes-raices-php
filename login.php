<?php 
    require 'includes/funciones.php';
    require 'includes/config/database.php';

    $db = conectarDB();

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';

        $email = mysqli_real_escape_string($db, filter_var($_POST['txtEmail'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['txtPassword']);

        if(!$email) {
            $errores[] = "El email es requerido o es inválido.";
        }

        if(!$password) {
            $errores[] = "El password es requerido.";
        }

        if (empty($errores)) {
            // Validar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $resultado = mysqli_query($db, $query);
            
            if ($resultado -> num_rows) {
                $usuario = mysqli_fetch_assoc($resultado);
                $auth = password_verify($password, $usuario['password']);

                if ($auth) {
                    session_start();
                    $_SESSION['usuairo'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                } else {
                    $errores[] = "El usuario o contraseña no es válido.";
                }
            } else {
                $errores[] = "El usuario o contraseña no es válido.";

            }
        }
        
    }

  

    
    incluirTemplate('header');

?>
    <main class="contenedor seccion contenido-centrado">

        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error) : ?>
            <div class="alerta error">

                <?php echo $error; ?>

            </div>
        <?php endforeach; ?>

        <form method="POST" action="" class="formulario">
            
            <fieldset>

                <legend>Email y Passoword</legend>

                <label for="txtEmail">Email</label>
                <input type="email" 
                        name="txtEmail" 
                        id="txtEmail" 
                        placeholder="Digita tu email"
                        required>

                <label for="txtPassword">Password</label>
                <input type="password" 
                        name="txtPassword" 
                        id="txtPassword" 
                        placeholder="Digita tu password"
                        required>

             
            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

        </form>

    </main>

    <?php 
    
    incluirTemplate('footer');

?>