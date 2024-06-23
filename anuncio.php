<?php 
require 'includes/funciones.php';
    
    incluirTemplate('header');

?>

<main class="contenedor seccion contenido-centrado">

    <h1>Casa en Venta y frente al bosque</h1>

    <picture>
        <source srcset="build/img/destacada.webp" type="image/webp">
        <source srcset="build/img/destacada.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen destacada">
    </picture>

    <div class="resumen-propiedad">

        <p class="precio">$3,000,000.00</p>

        <ul class="iconos-caracteristicas">

            <li>

                <img loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">

                <p>3</p>

            </li>

            <li>

                <img loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">

                <p>3</p>

            </li>

            <li>

                <img loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">

                <p>4</p>

            </li>

        </ul>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, ex? Quisquam, aut cupiditate! Odio, vero sunt. Praesentium quidem in aspernatur dicta similique quos rerum aliquid tempore eius, fuga asperiores laborum?</p>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, ex? Quisquam, aut cupiditate! Odio, vero sunt. Praesentium quidem in aspernatur dicta similique quos rerum aliquid tempore eius, fuga asperiores laborum?</p>

    </div>

</main>

<?php 
    
    incluirTemplate('footer');

?>