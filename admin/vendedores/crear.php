<?php 

require '../../includes/app.php';

use App\Vendedor;

estaAutenticado();

$vendedor = new Vendedor;

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();

// Ejecutar el código después de que el usuario envia el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // crear una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    //validar que no haya campos vacios
    $errores = $vendedor->validar();

    if(empty($errores)){
        $vendedor->guardar();
    }
}

?>

<?php include '../../includes/templates/header.php'?>

<main class="contenedor seccion">
    <h1>Registrar Vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ?>
    <div class="alerta error">
        <?php echo $error; ?>
    </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_vendedores.php'?>

        <input type="submit" value="Registrar Vendedores" class="boton boton-verde">
    </form>
        
</main>

<?php include '../../includes/templates/footer.php'?>