<?php 

    require '../../includes/app.php';
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    $propiedad = new Propiedad;
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // crea una nueva instancia

        $propiedad = new Propiedad($_POST['propiedad']);


        /** SUBIDA DE ARCHIVOS */

            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            //Setear la imagen
            //Realiza un resize a la imagen con intervention

            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
            

            //validar       
        $errores = $propiedad->validar();
        
        if(empty($errores)) {
                

        if(!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }    

            // Guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            //guardar en la base de datos
            $resultado = $propiedad->crear();
            
            
            if($resultado) {
                // Redireccionar al usuario.
                header('Location: /admin?resultado=1');
            }
        }
    }

?>
<?php include '../../includes/templates/header.php'?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
        
    </main>

    <?php include '../../includes/templates/footer.php'?> 