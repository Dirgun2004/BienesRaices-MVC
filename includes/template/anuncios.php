<?php
use App\Propiedad;

if($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
    $propiedades = Propiedad::all();
    } else {
    $propiedades = Propiedad::get(3);
}

?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>
    <div class="anuncio">
        
        <img class="img2" src="/imagenes/<?php echo $propiedad->imagenes; ?>" alt="anuncio" loading="lazy">

                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <p><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio">$<?php echo $propiedad->precio; ?></p>
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
                            <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono baños">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                    </ul>
                    <a href="anuncio.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                        ver propiedad
                    </a>
        </div> <!-- contenido del anuncio -->
    </div> <!-- anuncio -->  
    <?php endforeach; ?>    
</div> <!-- Contenedor de anuncios -->