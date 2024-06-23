<?php 
require 'includes/funciones.php';
    
    incluirTemplate('header');

?>
    <main class="contenedor">

        <h1>Contacto</h1>

        <picture>

            <source srcset="build/img/destacada3.webp" type="webp">
            <source srcset="build/img/destacada3.jpg" type="jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">

        </picture>

        <h2>Llene el formulario de contacto</h2>

        <form class="formulario">

            <fieldset>

                <legend>Información Personal</legend>

                <label for="txtNombre">Nombre</label>
                <input type="text" name="txtNombre" id="txtNombre" placeholder="Digita tu nombre">

                <label for="txtEmail">Email</label>
                <input type="email" name="txtEmail" id="txtEmail" placeholder="Digita tu email">

                <label for="txtTelefono">Teléfono</label>
                <input type="tel" name="txtTelefono" id="txtTelefono" placeholder="Digita tu teléfono">

                <label for="txtMensaje">Mensaje</label>
                <textarea name="txtMensaje" id="txtMensaje"></textarea>

            </fieldset>

            <fieldset>

                <legend>Información sobre la propiedad</legend>

                <label for="selOpciones">Vende o Compra</label>
                <select name="selOpciones" id="selOpciones">

                    <option value="" selected disabled>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Venta">Venta</option>

                </select>


                <label for="txtPresupuesto">Presupuesto</label>
                <text type="number" name="txtPresupuesto" id="txtPresupuesto" placeholder="Digita tu presupuesto">

            </fieldset>

            <fieldset>

                <legend>Información sobre la propiedad</legend>

                <p>¿Cómo desea ser contactado?</p>

                <div class="forma-contacto">

                    <label for="rbtnContactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" id="rbtnContactar-telefono" value="Teléfono">


                    <label for="rbtnContactar-email">Email</label>
                    <input type="radio" name="contacto" id="rbtnContactar-email" value="Email">

                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>


                <label for="txtFecha">Fecha</label>
                <input type="date" name="txtFecha" id="txtFecha">

                <label for="txtHora">Hora</label>
                <input type="time" name="txtHora" id="txtHora" min="08:00" max="17:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>

    </main>

    <?php 
    
    incluirTemplate('footer');

?>