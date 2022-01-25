<?php 
require 'includes/app.php';
// Importar clases
use App\Propiedad;

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id){
        header('Location: /');
    }

    $propiedad = Propiedad::find($id);


include 'includes/templates/header.php'?>
    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad->titulo; ?></h1>

        <picture>
        <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-anuncio" />
        </picture>

        <div class="resumen-propiedad">
            <h3 class="precio"><?php echo $propiedad->precio; ?></h3>
            <ul class="iconos-caracteristicas">
                <li class="iconoz">
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>

            <p class="anuncioz"><?php echo $propiedad->descripcion; ?></p>
        </div>
    </main>

<?php include 'includes/templates/footer.php'?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>