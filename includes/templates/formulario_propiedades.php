<fieldset>

    <legend>Información General</legend>

    <label for="txtTitulo">Titulo:</label>

    <input type="text" name="propiedad[titulo]" id="txtTitulo" placeholder="Título de la propiedad" value="<?php echo sanitizar($propiedad->titulo); ?>" />

    <label for="txtPrecio">Precio:</label>

    <input type="number" name="propiedad[precio]" id="txtPrecio" placeholder="Precio de la propiedad" value="<?php echo sanitizar($propiedad->precio); ?>" />

    <label for="txtImagen">Imagen:</label>

    <input type="file" name="propiedad[imagen]" id="txtImagen" accept="image/jpeg, image/png" />

    <?php if($propiedad -> imagen) { ?>

        <img src="/imagenes/<?php echo $propiedad -> imagen; ?>" class="imagen-small" />

    <?php } ?>

    <label for="txtDescripcion">Descripción:</label>

    <textarea id="txtDescripcion" name="propiedad[descripcion]"><?php echo sanitizar($propiedad->descripcion); ?></textarea>

</fieldset>

<fieldset>

    <legend>Información Propiedad</legend>

    <label for="txtHabitaciones">Habitaciones:</label>

    <input type="number" name="propiedad[habitaciones]" id="txtHabitaciones" placeholder="Ej. 3" min="1" max="100" value="<?php echo sanitizar($propiedad->habitaciones); ?>" />

    <label for="txtBanos">Baños:</label>

    <input type="number" name="propieadd[wc]" id="txtBanos" placeholder="Ej. 3" min="1" max="100" value="<?php echo sanitizar($propiedad -> wc); ?>" />

    <label for="txtEstacionamiento">Estacionamiento:</label>

    <input type="number" name="propiedad[estacionamiento]" id="txtEstacionamiento" placeholder="Ej. 3" min="1" max="100" value="<?php echo sanitizar($propiedad -> estacionamiento); ?>" />

</fieldset>

<fieldset>

    <legend>Vendedor</legend>

    <label for="vendedorId">Vendedor</label>
    <select id="vendedorId" name="propidedad[vendedorId]">
        <option value="" selected>-- Seleccione un Vendedor --</option>
        <?php foreach ($vendedores as $vendedor) { ?>
            <option <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : ''; ?> value="<?php echo sanitizar($vendedor->id); ?>"><?php echo sanitizar($vendedor->nombre) . " " . sanitizar($vendedor->apellido); ?></option>
        <?php } ?>
    </select>

</fieldset>