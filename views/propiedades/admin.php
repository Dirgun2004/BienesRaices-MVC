<main class="contenedor seccion">
    <h1>Administrador de bienes raices</h1>

        <?php
        $registro = $_GET['registro'] ?? null;
        if($registro){
            $mensaje = mostrarAlerta(intval($registro));
            if($mensaje){?>
            <p class="alerta success"><?php echo s($mensaje) ?></p>
        <?php } }?>
    <a href="/public/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/public/vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>

    <h2>Propiedades</h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>TITULO</th>
                <th>IMAGEN</th>
                <th>PRECIO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($propiedades as $propiedad) : ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td><img src="../public/imagenes/<?php echo $propiedad->imagenes; ?>" alt="" class="imagen-tabla"></td>
                <td><?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/public/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a class="boton-amarillo-block" href="/public/propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Vendedores</h2>

    <table class="propiedades vendedores">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE Y APELLIDO</th>
                <th>TELEFONO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($vendedores as $vendedores) : ?>
            <tr>
                <td><?php echo $vendedores->id; ?></td>
                <td><?php echo $vendedores->nombre . " " . $vendedores->apellido; ?></td>
                <td><?php echo $vendedores->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="/public/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedores->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a class="boton-amarillo-block" href="/public/vendedores/actualizar?id=<?php echo $vendedores->id; ?>">Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>