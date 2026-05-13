<fieldset>
    <legend>Informacion General</legend>
    <label for="titulo">Titulo:</label> <input type="text" id="titulo" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo); ?>">
    <label for="precio">Precio</label> <input type="number" id="precio" name="propiedad[precio]" value="<?php echo s($propiedad->precio); ?>">
    <label for="imagen">Imagenes:</label> <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image/png">
    <?php if($propiedad->imagenes): ?>
        <img src="/public/imagenes/<?php echo $propiedad->imagenes; ?>" alt="imagen" class="img-small">
    <?php endif; ?>    

    <label for="descripcion">Descripción:</label> <textarea name="propiedad[descripcion]" id="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
</fieldset>
<fieldset>
    <legend>Informacion de la propiedad</legend>
    <label for="habitaciones">Habitaciones:</label> <input type="number" min="1" max="10" id="habitaciones" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones); ?>">
    <label for="wc">Baños:</label> <input type="number" min="1" max="10" id="wc" name="propiedad[wc]" value="<?php echo s($propiedad->WC); ?>">
    <label for="estacionamiento">Puesto de estacionamiento:</label> <input type="number" min="0" max="20" id="estacionamiento" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>
<fieldset>
    <legend>Información del vendedor:</legend>
    <label for="idVendedor">Vendedor:</label>
    <select id="idVendedor" name="propiedad[idVendedor]">
        <option value="0" selected>-SELECCIONAR-</option>
                <?php foreach($vendedores as $vendedor){ ?>
                    <option 
                    <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ''; ?>
                    value="<?php echo s($vendedor->id) ?>"> 
                        <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido) ?> 
                    </option>
                <?php } ?>
    </select>
</fieldset>