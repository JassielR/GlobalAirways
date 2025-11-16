<?php
session_start();


$conexion = mysqli_connect("localhost:3306", "root", "", "globalairways");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}


if (!isset($_SESSION['intentos'])) {
    $_SESSION['intentos'] = 0;
}


if ($_SESSION['intentos'] >= 3) {
    echo "
    <script>
        alert('Has superado el número máximo de intentos. Inténtalo más tarde.');
        window.location.href='login.html';
    </script>";
    exit();
}


$nombre = $_POST['nombre'];
$clave = $_POST['clave'];


$consulta = "SELECT * FROM reservas WHERE nombre='$nombre' AND clave='$clave'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
    $_SESSION['usuario'] = $usuario;
    

    $_SESSION['intentos'] = 0;
    

    header("Location: panel.php");
    exit();
} else {
    $_SESSION['intentos']++;
    $restantes = 3 - $_SESSION['intentos'];
    echo "
    <script>
        alert('Usuario o contraseña incorrectos. Te quedan $restantes intento(s).');
        window.location.href='index.html';
    </script>";
}

mysqli_close($conexion);
?>
