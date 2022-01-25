<?php 
    require '../../includes/app.php';
    use App\Propiedad;
    use App\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;
    estaAutenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }
    $propiedad = Propiedad::find($id);

    // Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);

        $errores = $propiedad->validar();
        
        // Generar un nombre único
        //subida de archivos
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        if(empty($errores)) {
            if($_FILES['propiedad']['tmp_name']['imagen']){
                //Almacenar la imagen
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $propiedad->guardar();
        }
    }
?>
<?php include '../../includes/templates/header.php'?>

    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            
        <?php include '../../includes/templates/formulario_propiedades.php'?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

    <?php include '../../includes/templates/footer.php'?> 