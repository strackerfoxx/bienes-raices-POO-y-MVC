<?php $inicio = true; include 'includes/templates/header.php'; include 'includes/app.php'?>

    <main class="contenedor seccion">
        <h1>More About Us</h1>
            
        <div class="iconos-nosotros">
            <div class="icono">
            <img src="build/img/icono1.svg" alt="security" loading="lazy">
            <h3> security </h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Rerum iste inventore eveniet veniam quidem placeat dolores, 
                minus aut dolore alias nisi non neque magnam</p>
            </div>
            <div class="icono">
            <img src="build/img/icono2.svg" alt="money" loading="lazy">
            <h3> Price </h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Rerum iste inventore eveniet veniam quidem placeat dolores, 
                minus aut dolore alias nisi non neque magnam</p>
            </div>
            <div class="icono">
            <img src="build/img/icono3.svg" alt="clock" loading="lazy">
            <h3> Time </h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Rerum iste inventore eveniet veniam quidem placeat dolores, 
                minus aut dolore alias nisi non neque magnam</p>
            </div>    

        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>

            <?php 

            $limite = 3;

            include 'includes/templates/anuncios.php'
            ?>

        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Find the home of your dreams</h2>
        <p>Fill out the contact form and an advisor will contact you shortly</p>
        <a href="contacto.php" class="boton-amarillo">Contact us</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p>Escrito el: <span>20/10/2021</span> por: <span>Stracker Foxx &copy;</span></p>
                    
                        <p>
                            Consejos para construir una terraza 
                        </p>
                    
                    </a>
                </div>
            </article>


            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>guia para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>20/10/2021</span> por: <span>Stracker Foxx &copy;</span></p>
                    
                        <p>
                        </p>
                    
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comporto de una excelente forma muy buena atencion 
                    y la casa que me ofrecieron cumple con todas mis espectativas
                </blockquote>
                <p>. Anonimo</p>
            </div>
        </section>
    </div>

<?php
incluirTemplate('footer');
?>