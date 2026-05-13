<main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Correo:</label>
            <input type="email" placeholder="Tu correo" name="email" id="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" placeholder="Tu contraseña" name="password" id="password" required>

        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton-verde">
    </form>
</main>