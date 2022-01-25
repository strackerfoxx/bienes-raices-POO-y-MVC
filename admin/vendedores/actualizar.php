<?php 
require '../../includes/app.php';
use App\Vendedor;
estaAutenticado();

// Validar que sea un ID valido 

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('Location: /admin');
}

// ontener arreglo de vendedor desde la base de datos
$vendedor= Vendedor::find($id);

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

// Ejecutar el código después de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // asigna rlos valores
    $args = $_POST['vendedor'];
    
    // sincronizar objeto en memoria con lo que el usuario escribio
    $vendedor->sincronizar($args);

    // validacion
    $errores = $vendedor->validar();


   if(empty($errores)){
        $vendedor->guardar();
    
   }
}

?>

<?php include '../../includes/templates/header.php'?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" >

        <?php include '../../includes/templates/formulario_vendedores.php'?>

        <input type="submit" value="Guardar cambios" class="boton boton-verde">
    </form>
        
</main>

<?php include '../../includes/templates/footer.php'?>