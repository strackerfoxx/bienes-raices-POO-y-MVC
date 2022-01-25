<?php 

include 'includes/app.php';
$db = conectarDB();
//autenticar el usuario 

$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email =    mysqli_real_escape_string($db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[] = "El email es obligatorio o no es valido.";
    }

    if(!$password){
        $errores[] = "La password es obligatorio.";
    }

    if(empty($errores)){
        
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        if( $resultado->num_rows ){
            // Revisar si el password es existe
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar si el password es correcto

            $auth = password_verify($password, $usuario['password']);
            if($auth){
                session_start();

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');

            }else{
                $errores[] = "La password es incorrecta.";
            }
        }else{
            $errores[] = "El usuario no existe.";
        }
    }

}

//incluye el header
include 'includes/templates/header.php'?>

<main class="contenedor">
    <h1>Iniciar Sesion</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario">
    <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" required>

                <label for="password">password</label>
                <input type="password" name="password" placeholder="Tu password" id="password" required>

            </fieldset>
            <input type="submit" value="Login" class="boton boton-verde">
    </form>
</main>

<?php include 'includes/templates/footer.php'?>