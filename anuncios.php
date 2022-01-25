<?php include 'includes/templates/header.php'; include 'includes/app.php';?>

    <main class="seccion contenedor">
        <h2>Houses & Apartment's on sell</h2>
            
            <?php 
            $limite = 100000;
            include 'includes/templates/anuncios.php';
            ?>

    </main>

    <?php include 'includes/templates/footer.php'?>