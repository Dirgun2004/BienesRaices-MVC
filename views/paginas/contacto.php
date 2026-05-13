    <main class="contenedor seccion contenido-centrado">
        <h1>Contactanos</h1>

        <?php if($mensaje){ ?>
           <p class="alerta success"><?php echo s($mensaje) ?></p>
        <?php } ?>
        
        <picture>
            <source srcset="/public/build/img/destacada3.webp" type="img/webp">
            <source srcset="/public/build/img/destacada3.jpg" type="img/jpeg">
            <img src="/public/build/img/destacada3.jpg" alt="Imagen formulario de contacto">
        </picture>

        <form class="formulario" method="post">
            <fieldset>
                <legend>Informacion Personal</legend>
                
                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required></textarea>                
            </fieldset>
            <fieldset>
                <legend>Informacion de la propiedad</legend>

                <label for="seleccion-propiedad">Vende o Compra</label>
                <select name="contacto[tipo]" id="seleccion-propiedad" required>
                    <option value="1" selected disabled>-- Seleccione --</option>
                    <option value="2">Compra</option>
                    <option value="3">Alquilar</option>
                </select>   

                <label for="monto">Cantidad:</label> 
                <input type="number" placeholder="Monto" id="monto" name="contacto[precio]">                

            </fieldset>
            <fieldset>
                <legend>CONTACTO</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">telefono</label> <input name="contacto[contacto]" type="radio" id="contactar-telefono" value="telefono" required>
                    <label for="contactar-email">correo</label> <input name="contacto[contacto]" type="radio" id="contactar-email" value="email" required>
                </div>  
                <div class="" id="contacto"></div>         
            </fieldset>
            <input type="submit" class="boton-verde" value="Enviar">
        </form>
    </main>