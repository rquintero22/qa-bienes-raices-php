<?php 
    require 'includes/app.php';
    
    incluirTemplate('header');

?>
    <main class="contenedor">

        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">

            <div class="imagen">

                <picture>

                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Imagen nosotros">

                </picture>

            </div>

            <div class="texto-nosotros">

                <blockquote>
                    25 Años de experiencia
                </blockquote>

                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam corrupti quia sapiente fugit. Id veritatis tempore quos quas exercitationem suscipit consectetur nisi excepturi laborum, pariatur, ipsa ducimus corrupti repellendus quis.
                </p>

                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam corrupti quia sapiente fugit. Id veritatis tempore quos quas exercitationem suscipit consectetur nisi excepturi laborum, pariatur, ipsa ducimus corrupti repellendus quis.
                </p>


            </div>

        </div>

    </main>

    <section class="contenedor">

        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">

            <div class="icono">

                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">

                <h3>Seguridad</h3>

                <p>Odio commodi cum modi beatae error cupiditate molestiae animi! Deleniti natus aspernatur, tempore optio iusto tempora minima voluptatem dolorum dolorem explicabo adipisci!</p>

            </div> <!-- .Icono-->

            <div class="icono">

                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">

                <h3>Precio</h3>

                <p>Odio commodi cum modi beatae error cupiditate molestiae animi! Deleniti natus aspernatur, tempore optio iusto tempora minima voluptatem dolorum dolorem explicabo adipisci!</p>

            </div> <!-- .Icono-->

            <div class="icono">

                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">

                <h3>A Tiempo</h3>

                <p>Odio commodi cum modi beatae error cupiditate molestiae animi! Deleniti natus aspernatur, tempore optio iusto tempora minima voluptatem dolorum dolorem explicabo adipisci!</p>

            </div> <!-- .Icono-->

        </div>

    </section>
    
    <?php 
    
    incluirTemplate('footer');

?>