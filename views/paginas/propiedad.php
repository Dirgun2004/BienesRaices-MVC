    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

            <img src="imagenes/<?php echo $propiedad->imagenes; ?>" alt="anuncio" loading="lazy">

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad->precio; ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img class="icono" src="build/img/icono_wc.svg" alt="icono baños">
                        <p><?php echo $propiedad->WC; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                </ul>

            <p><?php echo $propiedad->descripcion; ?></p>

        </div>

    </main>