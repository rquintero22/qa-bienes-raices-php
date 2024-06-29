<fieldset>

   
    <legend>Información General</legend>

    <label for="txtNombre">Nombre:</label>

    <input type="text" name="vendedor[nombre]" id="txtNombre" placeholder="Título de la vendedor" value="<?php echo sanitizar($vendedor->nombre); ?>" />

    <label for="txtApellido">Apellido:</label>

    <input type="text" name="vendedor[apellido]" id="txtApellido" placeholder="Apellido del vendedor" value="<?php echo sanitizar($vendedor->apellido); ?>" />

</fieldset>

<fieldset>

    <legend>Información Adicional</legend>

    <label for="txtTelefono">Teléfono:</label>

    <input type="tel" name="vendedor[telefono]" id="txtTelefono" placeholder="Teléfono del vendedor" value="<?php echo sanitizar($vendedor->telefono); ?>" />

</fieldset>
