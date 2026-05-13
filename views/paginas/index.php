    <main class="contenedor seccion">
        <h1>Más sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="/public/build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Cum excepturi id nobis aliquam delectus repellat nemo doloremque corrupti consequuntur eos? Temporibus aliquam molestias veritatis porro nostrum ut hic minima amet?</p>
            </div>
            <div class="icono">
                <img src="/public/build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Cum excepturi id nobis aliquam delectus repellat nemo doloremque corrupti consequuntur eos? Temporibus aliquam molestias veritatis porro nostrum ut hic minima amet?</p>
            </div>
            <div class="icono">
                <img src="/public/build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Cum excepturi id nobis aliquam delectus repellat nemo doloremque corrupti consequuntur eos? Temporibus aliquam molestias veritatis porro nostrum ut hic minima amet?</p>
            </div>
        </div>
    </main>
    <!-- ANUNCIOS  -->
    <section class="seccion contenedor"> 
        <h1>Casas y Departamentos en Venta</h1>
        
        <?php $limite = 3; include 'listado.php'; ?>

        <div class="alinear-derecha">
            <a href="/public/propiedades" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario a continuacion y un asesor se pondra en contacto contingo en la brevedad</p>
        <a href="/public/contacto" class="boton-amarillo-block">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
        
            <article class="entrada-blog">
                <div class="image">
                    <picture>
                        <source srcset="/public/build/img/blog1.webp" type="img/webp" >
                        <source srcset="/public/build/img/blog1.jpg" type="img/jpeg" >
                        <img src="/public/build/img/blog1.jpg" alt="imagen de entrada de blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/public/entrada">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                        <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="image">
                    <picture>
                        <source srcset="/public/build/img/blog2.webp" type="img/webp" >
                        <source srcset="/public/build/img/blog2.jpg" type="img/jpeg" >
                        <img src="/public/build/img/blog2.jpg" alt="imagen de entrada de blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="/public/entrada">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2025</span> por: <span>Admin</span></p>

                        <p>Maximiza el espacio de hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu hogar</p>
                    </a>
                </div>
            </article>
        </section>
        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    Excelente atencíon por parte del personal, y muy buena presencia, los recomiendo al 100%, todo lo uqe ofrecen cumple las expectativas y mucho mas
                </blockquote>
                <p>- Alicia Battiz</p>
            </div>
        </section>
    </div>
