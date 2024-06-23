<?php 
require 'includes/funciones.php';
    
    incluirTemplate('header');

?>
    <main class="contenedor contenido-centrado">

        <h1>Guía para la decoración de tu hogar</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="Imagen destacada">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>19-06-2024</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, ex? Quisquam, aut cupiditate! Odio, vero sunt. Praesentium quidem in aspernatur dicta similique quos rerum aliquid tempore eius, fuga asperiores laborum?</p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, ex? Quisquam, aut cupiditate! Odio, vero sunt. Praesentium quidem in aspernatur dicta similique quos rerum aliquid tempore eius, fuga asperiores laborum?</p>

        </div>

    </main>

    <?php 
    
    incluirTemplate('footer');

?>